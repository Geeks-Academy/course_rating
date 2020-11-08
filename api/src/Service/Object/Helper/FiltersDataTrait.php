<?php

namespace App\Service\Object\Helper;

trait FiltersDataTrait
{
    protected function filter(array $keys, array $data)
    {
        return array_intersect_key(
            $data, array_flip(array_unique($keys))
        );
    }
}