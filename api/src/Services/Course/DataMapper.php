<?php

namespace App\Services\Course;

use App\Entity\Course;
use App\Services\Mapper;

class DataMapper implements Mapper
{
    private Course $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function toEndpointFormat(): array
    {
        return [
            Dictionary::REPOSITORY_URL  => $this->course->getRepositoryUrl(),
            Dictionary::LANGUAGE        => $this->course->getLanguage(),
            Dictionary::PRICE           => $this->course->getPrice(),
            Dictionary::TITLE           => $this->course->getTitle(),
            Dictionary::AUTHOR          => $this->course->getAuthor(),
            Dictionary::NAME            => $this->course->getName(),
            Dictionary::RELEASE_DATE    => $this->course->getReleaseDate(),
            Dictionary::URL             => $this->course->getUrl(),
            Dictionary::DURATION        => $this->course->getDuration(),
            Dictionary::IS_REVIEWED     => $this->course->getIsReviewed(),
        ];
    }

    public function jsonSerialize()
    {
        return $this->toEndpointFormat();
    }
}