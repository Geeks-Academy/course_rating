<?php

namespace App\Service\Entity\Course;

use App\Entity\Course;
use App\Entity\CourseArea;
use App\Service\Entity\CourseArea\CourseAreaFormatter;
use App\Service\Object\AbstractFormatter;

class CourseFormatter extends AbstractFormatter
{
    private Course $course;

    protected array $relations = [
        'areas.courses'
    ];

    /**
     * CourseFormatter constructor.
     * @param Course $course
     */
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    protected function areasToArray()
    {
        return array_map(
            fn(CourseArea $area) => new CourseAreaFormatter($area), $this->course->getAreas()->toArray()
        );
    }

    protected function getData(): array
    {
        return [
            'id'              => $this->course->getId(),
            'repository_url'  => $this->course->getRepositoryUrl(),
            'language'        => $this->course->getLanguage(),
            'price'           => $this->course->getPrice(),
            'title'           => $this->course->getTitle(),
            'author'          => $this->course->getAuthor(),
            'name'            => $this->course->getName(),
            'release_date'    => $this->course->getReleaseDate(),
            'url'             => $this->course->getUrl(),
            'duration'        => $this->course->getDuration(),
            'areas'           => fn() => $this->areasToArray(),
        ];
    }
}
