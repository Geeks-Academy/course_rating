<?php

namespace App\Service\Entity\CourseArea;

use App\Entity\Course;
use App\Entity\CourseArea;
use App\Service\Entity\Course\CourseFormatter;
use App\Service\Entity\CourseTechnology\CourseTechnologyFormatter;
use App\Service\Object\AbstractFormatter;

class CourseAreaFormatter extends AbstractFormatter
{
    private CourseArea $area;

    protected array $relations = [
        'courses',
        'technologies'
    ];

    /**
     * CourseAreaFormatter constructor.
     * @param CourseArea $area
     */
    public function __construct(CourseArea $area)
    {
        $this->area = $area;
    }

    protected function getCourses()
    {
        return array_map(
            fn(Course $course) => new CourseFormatter($course), $this->area->getCourses()->toArray()
        );
    }

    protected function getTechnologies()
    {
        return array_map(
            fn(Course $course) => new CourseTechnologyFormatter($course), $this->area->getCourses()->toArray()
        );
    }

    protected function getData(): array
    {
        return [
            CourseAreaDictionary::ID           => $this->area->getId(),
            CourseAreaDictionary::NAME         => $this->area->getName(),
            CourseAreaDictionary::IS_ACTIVE    => $this->area->getIsActive(),
            CourseAreaDictionary::COURSES      => fn() => $this->getCourses(),
            CourseAreaDictionary::TECHNOLOGIES => fn() => $this->getTechnologies()
        ];
    }
}
