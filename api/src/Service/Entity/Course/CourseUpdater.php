<?php

namespace App\Service\Entity\Course;

use App\Service\Object\AbstractObjectUpdater;

class CourseUpdater extends AbstractObjectUpdater
{
    /**
     * @return array
     */
    public function getAvailable(): array
    {
        return [
            CourseDictionary::REPOSITORY_URL,
            CourseDictionary::LANGUAGE,
            CourseDictionary::PRICE,
            CourseDictionary::TITLE,
            CourseDictionary::AUTHOR,
            CourseDictionary::NAME,
            CourseDictionary::RELEASE_DATE,
            CourseDictionary::URL,
            CourseDictionary::DURATION,
        ];
    }

}