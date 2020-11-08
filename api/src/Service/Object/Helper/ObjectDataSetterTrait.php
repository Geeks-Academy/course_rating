<?php

namespace App\Service\Object\Helper;

use InvalidArgumentException;

trait ObjectDataSetterTrait
{
    private array $resolvers = [];
    private array $decorators = [];

    /**
     * Override this to register any resolver or decorator
     */
    protected function registerObjectDataSetterSpecifics()
    {
    }

    /**
     * Similar usage to "shouldSet[name]Attribute method, but gives you more control"
     *
     * @param string $key
     * @param callable $callback
     */
    protected function registerObjectDataSetterResolver(string $key, callable $callback)
    {
        $this->resolvers[$key] = $callback;
    }

    /**
     * Similar usage to "set[name]Attribute", but gives you clearer way of using it
     *
     * @param string $key
     * @param callable $callback
     */
    protected function registerObjectDataSetterDecorator(string $key, callable $callback)
    {
        $this->decorators[$key] = $callback;
    }

    /**
     * You may handle automatically resolved setters collection before
     * it will be used to set any data into your entity, just override
     * this and return your "custom" data array
     *
     * Usage: [data key] => [object setter]
     *
     * @param array $setters
     * @return array
     */
    protected function getCustomObjectDataSetterDataMapping(array $setters = []): array
    {
        return $setters;
    }

    /**
     * You may specify here your rule, if value should be set to your entity.
     * By default, nullable values will be omitted by data setter
     *
     * @param string $key
     * @param $value
     * @return bool
     */
    protected function shouldObjectDataSetterResolveAttribute(string $key, $value): bool
    {
        return !is_null($value);
    }

    private function stringToCamelCase(string $value)
    {
        return preg_replace(
            '/\s/', '', ucwords(preg_replace('/-|_/', ' ', $value))
        );
    }

    /**
     * It resolves your setter rule per specific attribute, for example
     * value named "name" will be resolved to "shouldSetNameAttribute"
     *
     * @param string $key
     * @param $value
     * @return bool
     */
    private function shouldObjectDataSetterResolveSpecificAttribute(string $key, $value): bool
    {
        $resolverMethod = sprintf('shouldSet%sAttribute', $this->stringToCamelCase($key));

        if(method_exists($this, $resolverMethod)) {
            return call_user_func_array([$this, $resolverMethod], [$value]);
        }

        return true;
    }

    private function getObjectDataSetterDataMapping(array $attributes)
    {
        $setters = [];

        foreach ($attributes as $key => $value) {
            $setters[$key] = sprintf('set%s', $this->stringToCamelCase($key));
        }
        return $this->getCustomObjectDataSetterDataMapping($setters);
    }

    /**
     * It checks for custom setter decorator per value, for example
     * method named "name" will try to resolve callable registered
     * using "registerObjectDataSetterDecorator"
     *
     * @see ObjectDataSetterTrait::registerObjectDataSetterDecorator()
     * @param string $key
     * @param $value
     * @return mixed
     */
    private function resolveObjectDataEntitySetterDecorator(string $key, $value)
    {
        if (key_exists($key, $this->decorators) && is_callable($decorator = $this->decorators[$key])) {
            return call_user_func_array($decorator, [$value]);
        }

        return $value;
    }

    private function resolveObjectDataEntitySetterCallable(object $entity, string $method, string $key)
    {
        if(key_exists($key, $this->resolvers) && is_callable($callable = $this->resolvers[$key])) {
            return [$callable];
        }

        if(method_exists($this, $_method = sprintf('%sAttribute', $method))) {
            return [$this, $_method];
        }

        if(method_exists($entity, $method)) {
            return [$entity, $method];
        }

        throw new InvalidArgumentException(
            sprintf("Setter was not registered for \"%s\" attribute, expected: [\"%s\"]", $key, $method)
        );
    }

    protected function objectSetterDataToObject(object $entity, array $attributes)
    {
        $setters = $this->getObjectDataSetterDataMapping($attributes);

        foreach ($setters as $key => $method) {
            if(!key_exists($key, $attributes)) {
                continue;
            }

            $value = $attributes[$key];

            if(
                !$this->shouldObjectDataSetterResolveAttribute($key, $value) ||
                !$this->shouldObjectDataSetterResolveSpecificAttribute($key, $value)
            ) {
                continue;
            }

            call_user_func_array($this->resolveObjectDataEntitySetterCallable($entity, $method, $key), [
                $this->resolveObjectDataEntitySetterDecorator($method, $value)
            ]);
        }
    }

}