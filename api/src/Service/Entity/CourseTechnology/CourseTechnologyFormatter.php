<?php

namespace App\Service\Entity\CourseTechnology;

use App\Entity\Course;
use App\Entity\CourseArea;
use App\Entity\CourseTechnology;
use App\Service\Entity\Course\CourseFormatter;
use App\Service\Entity\CourseArea\CourseAreaFormatter;
use App\Service\Object\AbstractFormatter;

class CourseTechnologyFormatter extends AbstractFormatter
{
    private CourseTechnology $technology;

    protected array $relations = [
        'courses',
        'areas'
    ];

    public function __construct(CourseTechnology $technology)
    {
        $this->technology = $technology;
    }

    protected function getAreas()
    {
        return array_map(
            fn(CourseArea $area) => new CourseAreaFormatter($area), $this->technology->getAreas()->toArray()
        );
    }

    protected function getCourses()
    {
        return array_map(
            fn(Course $area) => new CourseFormatter($area), $this->technology->getCourses()->toArray()
        );
    }

    protected function getData(): array
    {
        return [
            'id'          => $this->technology->getId(),
            'title'       => $this->technology->getTitle(),
            'description' => $this->technology->getDescription(),
            'logo'        => $this->technology->getLogo(),
            'courses'     => fn() => $this->getCourses(),
            'areas'       => fn() => $this->getAreas()
        ];
    }
}
