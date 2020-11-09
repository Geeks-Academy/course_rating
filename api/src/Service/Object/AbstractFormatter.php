<?php

namespace App\Service\Object;

abstract class AbstractFormatter
{
    private array $skip = [];

    private array $with = [];

    /**
     * Override this to set allow calling your callback relations
     *
     * @var array
     */
    protected array $relations = [];

    abstract protected function getData(): array;

    private function allowsLazyLoading(string $relation, array $with): bool
    {
        foreach ($with as $index => $relations) {
            if($relations[0] === $relation) {
                return true;
            }
        }

        return false;
    }

    private function getWithForKey(array $with, string $relation): array
    {
        $newWith = [];

        foreach ($with as $relations) {
            if($relations[0] === $relation && count($relations) > 1) {
                array_shift($relations);

                $newWith[] = $relations;
            }
        }

        return $newWith;
    }

    /**
     * Loads your closure based relation
     *
     * @param string ...$keys
     * @return $this
     */
    public function with(string ...$keys): self
    {
        $config = $this->configToArray($keys);

        $this->with = $this->merge(
            $this->with, $this->filter($config, $this->configToArray($this->relations))
        );

        return clone $this;
    }

    public function skip(string ...$keys): self
    {
        $this->skip = $this->merge(
            $this->skip, $this->configToArray($keys)
        );

        return $this;
    }

    private function filter(array $config, array $accepts)
    {
        $accepted = [];

        foreach ($accepts as $accept) {
            $accepted[] = array_reduce(
                array_map(
                    function ($entry) use ($accept) {
                        return array_intersect_assoc($entry, $accept);
                    },
                    $config
                ),
                function (array $carry, array $item) {
                    if(count($item) > count($carry)) {
                        return $item;
                    }

                    return $carry;
                }, []
            );
        }

        return $accepted;
    }

    private function merge(array $config, array $toMerge): array
    {
        foreach ($toMerge as $entry) {
            $config[] = $entry;
        }

        return array_map(
            "unserialize", array_unique(array_map("serialize", $config))
        );
    }

    private function configToArray(array $config)
    {
        $data = [];

        foreach ($config as $entry) {
            $data[] = explode('.', $entry);
        }

        return $data;
    }

    private function shouldSkip(array $skip, string $key): bool
    {
        foreach ($skip as $_skip) {
            if(count($_skip) > 1) {
                continue;
            }

            if(count($_skip) == 1 && $_skip[0] == $key) {
                return true;
            }
        }

        return false;
    }

    private function getSkipForKey(array $skip, string $key): array
    {
        $newSkip = [];

        foreach ($skip as $skipItem) {
            if(count($skipItem) < 2) {
                continue;
            }

            if($skipItem[0] == $key) {
                array_shift($skipItem);

                $newSkip[] = $skipItem;
            }
        }

        return $newSkip;
    }

    private function resolveInheritFormatter(AbstractFormatter $value, string $relation, string $method, array $skip = [], array $with = [])
    {
        if ($this->allowsLazyLoading($relation, $with)) {
            return call_user_func_array([$value, $method], [$value->getData(), $skip, $this->getWithForKey($with, $relation)]);
        } else {
            return null;
        }
    }

    private function resolveInheritCallable(callable $value, string $relation, string $method, array $skip = [], array $with = [])
    {
        if ($this->allowsLazyLoading($relation, $with)) {
            $result = call_user_func($value, []);

            if($result instanceof AbstractFormatter) {
                return $this->resolveInheritFormatter($result, $relation, $method, $this->getSkipForKey($skip, $relation), $with);
            }

            if(is_array($result)) {
                return $this->resolveToArray($result, $skip, $with, $relation);
            }

            return $value;
        } else {
            return null;
        }
    }

    private function filterArrayCollection(array $array)
    {
        return array_filter($array, function ($value) {
            return $value !== null;
        });
    }

    protected function resolveToArray(array $data, array $skip = [], array $with = [], string $relation = null)
    {
        $resolvedData = [];

        foreach ($data as $key => $value) {
            if($this->shouldSkip($skip, $key)) {
                continue;
            }

            if(is_array($value)) {
                $resolvedData[$key] = $this->filterArrayCollection(
                    $this->resolveToArray($value, $skip, $with, $key),
                );

                continue;
            }

            if($value instanceof AbstractFormatter) {
                $resolvedData[$key] = $this->resolveInheritFormatter(
                    $value, $relation ?? $key, 'resolveToArray', $this->getSkipForKey($skip, $relation), $with
                );

                continue;
            }

            if(is_callable($value)) {
                $resolvedData[$key] = $this->resolveInheritCallable(
                    $value, $relation ?? $key, 'resolveToArray', $skip, $with
                );

                continue;
            }

            $resolvedData[$key] = $value;
        }

        return $resolvedData;
    }

    public function toArrayFormat(): array
    {
        return $this->resolveToArray(
            $this->getData(), $this->skip, $this->with
        );
    }

}
