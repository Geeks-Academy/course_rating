<?php

namespace App\Services\Course;

use App\Services\Entity\Builder\ObjectBuilderTrait;
use DateTime;

/**
 * Class CourseBuilder
 *
 * @package App\Services\Course
 */
class CourseBuilder extends ObjectBuilderTrait
{
    /**
     * @return array
     */
    public function getDefaults(): array
    {
        return [
            Dictionary::REPOSITORY_URL  => '',
            Dictionary::LANGUAGE        => 'en',
            Dictionary::PRICE           => 0,
            Dictionary::TITLE           => '',
            Dictionary::AUTHOR          => '',
            Dictionary::NAME            => '',
            Dictionary::RELEASE_DATE    => new DateTime('now'),
            Dictionary::URL             => '',
            Dictionary::DURATION        => '',
        ];
    }
}