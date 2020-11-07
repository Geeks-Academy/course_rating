<?php

namespace App\Services\Object\Helpers;

use InvalidArgumentException;

trait ObjectDataSetterTrait
{
    /**
     * You may handle automatically resolved setters collection before
     * it will be used to set any data into your entity, just override
     * this and return your "custom" data array
     *
     * @param array $setters
     * @return array
     */
    protected function getCustomSettersDataMapping(array $setters = []): array
    {
        return $setters;
    }

    /**
     * You may specify here your rule, if value should be set to your entity
     * for defaults, nullable values will be omitted by data setter
     *
     * @param string $key
     * @param $value
     * @return bool
     */
    protected function shouldSetAttributeToEntity(string $key, $value): bool
    {
        return !is_null($value);
    }

    /**
     * It resolves your setter rule per specific attribute, for example
     * value named "name" will be resolved to "shouldSetNameAttribute"
     *
     * @param string $key
     * @param $value
     * @return bool
     */
    private function shouldSetSpecificAttributeToEntity(string $key, $value): bool
    {
        $resolverMethod = sprintf('shouldSet%sAttribute', $key);

        if(method_exists($this, $resolverMethod)) {
            return call_user_func_array([$this, $resolverMethod], [$value]);
        }

        return true;
    }

    private function getSettersDataMapping(array $data)
    {
        return $this->getCustomSettersDataMapping(
            array_map(fn($value, $key) => sprintf('set%s', ucfirst($key)), $data),
        );
    }

    /**
     * It checks for custom proxy setter per value, for example
     * method named "setName" will try to resolve "setNameAttribute"
     * method on itself, where you can do eny custom data mapping
     *
     * @param string $setter
     * @param $value
     * @return mixed
     */
    protected function resolveEntitySetterProxy(string $setter, $value)
    {
        $proxySetter = sprintf('%sAttribute', $setter);

        if(method_exists($this, $proxySetter)) {
            return call_user_func_array([$this, $proxySetter], [$value]);
        }

        return $value;
    }

    protected function appendDataToEntity(object $entity, array $data)
    {
        $setters = $this->getSettersDataMapping($data);

        foreach ($setters as $dataKey => $method) {
            if(
                !key_exists($dataKey, $data) ||
                !$this->shouldSetAttributeToEntity($dataKey, $value = $data[$dataKey]) ||
                !$this->shouldSetSpecificAttributeToEntity($dataKey, $value)
            ) {
                continue;
            }

            if(!method_exists($entity, $method)) {
                throw new InvalidArgumentException(
                    sprintf("Setter \"%s\" not exists in class \"%s\"", $method, get_class($entity))
                );
            }

            call_user_func_array([$entity, $method], [
                $this->resolveEntitySetterProxy($method, $value)
            ]);
        }
    }
}