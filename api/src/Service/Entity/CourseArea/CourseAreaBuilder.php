<?php

namespace App\Service\Entity\CourseArea;

use App\Service\Object\AbstractObjectBuilder;

class CourseAreaBuilder extends AbstractObjectBuilder
{
    protected function getDefaults(): array
    {
        return [
            CourseAreaDictionary::NAME => '',
            CourseAreaDictionary::IS_ACTIVE => true
        ];
    }
}