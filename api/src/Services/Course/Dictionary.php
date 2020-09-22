<?php

namespace App\Services\Course;

use ReflectionClass;

final class Dictionary
{
    public const REPOSITORY_URL = 'repository_url';

    public const LANGUAGE = 'language';

    public const PRICE = 'price';

    public const TITLE = 'title';

    public const AUTHOR = 'author';

    public const NAME = 'name';

    public const RELEASE_DATE = 'release_date';

    public const URL = 'url';

    public const DURATION = 'duration';

    public static function toArray()
    {
        return array_values(
            (new ReflectionClass(self::class))->getConstants()
        );
    }
}