<?php

namespace App\Services;

use ReflectionClass;

abstract class Dictionary
{
    public static function toArray()
    {
        return array_values(
            (new ReflectionClass(self::class))->getConstants()
        );
    }
}