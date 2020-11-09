<?php

namespace App\Service\Entity\CourseTechnology;

use App\Service\Object\AbstractObjectBuilder;

class CourseTechnologyBuilder extends AbstractObjectBuilder
{
    protected function getDefaults(): array
    {
        return [
            CourseTechnologyDictionary::CODE        => 1,
            CourseTechnologyDictionary::LOGO        => '',
            CourseTechnologyDictionary::DESCRIPTION => 'Default description',
            CourseTechnologyDictionary::NAME        => 'Technology',
        ];
    }
}
