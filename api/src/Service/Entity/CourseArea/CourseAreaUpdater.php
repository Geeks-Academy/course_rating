<?php

namespace App\Service\Entity\CourseArea;

use App\Service\Object\AbstractObjectUpdater;

class CourseAreaUpdater extends AbstractObjectUpdater
{
    public function getAvailable(): array
    {
        return [
            CourseAreaDictionary::NAME,
            CourseAreaDictionary::IS_ACTIVE
        ];
    }
}