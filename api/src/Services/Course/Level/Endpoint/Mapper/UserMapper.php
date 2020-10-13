<?php

namespace App\Services\Course\Level\Endpoint\Mapper;

use App\Entity\Course;
use App\Entity\CourseLevel;
use App\Services\Course\Level\Dictionary;
use App\Services\Mapper;

class UserMapper implements Mapper
{
    private CourseLevel $courseLevel;

    public function __construct(CourseLevel $courseLevel)
    {
        $this->courseLevel = $courseLevel;
    }

    public function toEndpointFormat(): array
    {
        return [
            Dictionary::NAME  => $this->courseLevel->getName(),
            Dictionary::VALUE => $this->courseLevel->getValue()
        ];
    }

    public function jsonSerialize()
    {
        return $this->toEndpointFormat();
    }
}