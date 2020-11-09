<?php

namespace App\Service\Object;

use ReflectionClass;

abstract class AbstractDictionary
{
    public static function dictionaryToArray()
    {
        return array_values(
            (new ReflectionClass(self::class))->getConstants()
        );
    }
}