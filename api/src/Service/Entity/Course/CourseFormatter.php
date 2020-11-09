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
            CourseDictionary::ID              => $this->course->getId(),
            CourseDictionary::REPOSITORY_URL  => $this->course->getRepositoryUrl(),
            CourseDictionary::LANGUAGE        => $this->course->getLanguage(),
            CourseDictionary::PRICE           => $this->course->getPrice(),
            CourseDictionary::TITLE           => $this->course->getTitle(),
            CourseDictionary::AUTHOR          => $this->course->getAuthor(),
            CourseDictionary::NAME            => $this->course->getName(),
            CourseDictionary::RELEASE_DATE    => $this->course->getReleaseDate(),
            CourseDictionary::URL             => $this->course->getUrl(),
            CourseDictionary::DURATION        => $this->course->getDuration(),
            CourseDictionary::AREAS           => fn() => $this->areasToArray(),
        ];
    }
}
