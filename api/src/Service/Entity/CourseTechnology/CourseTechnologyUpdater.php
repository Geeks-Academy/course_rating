<?php

namespace App\Service\Entity\CourseTechnology;

use App\Service\Object\AbstractObjectUpdater;

class CourseTechnologyUpdater extends AbstractObjectUpdater
{
    public function getAvailable(): array
    {
        return [
            CourseTechnologyDictionary::NAME,
            CourseTechnologyDictionary::DESCRIPTION,
            CourseTechnologyDictionary::LOGO,
            CourseTechnologyDictionary::CODE
        ];
    }
}
