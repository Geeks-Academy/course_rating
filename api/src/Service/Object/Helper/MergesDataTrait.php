<?php

namespace App\Service\Object\Helper;

trait MergesDataTrait
{
    protected function merge(array $defaults, array $data)
    {
        return array_merge(
            $defaults, array_intersect_key($data, $defaults)
        );
    }
}