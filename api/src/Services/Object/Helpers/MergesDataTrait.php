<?php

namespace App\Services\Object\Helpers;

trait MergesDataTrait
{
    protected function merge(array $defaults, array $data)
    {
        return array_merge(
            $defaults, array_intersect_key($data, $defaults)
        );
    }
}