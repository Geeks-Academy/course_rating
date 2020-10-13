<?php

namespace App\Services\Course\Endpoint\Mapper;

use App\Entity\Course;
use App\Services\Course\Dictionary;
use App\Services\Course\Level\Endpoint\Mapper\UserMapper as LevelUserMapper;
use App\Services\Mapper;

class UserMapper implements Mapper
{
    private Course $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function toEndpointFormat(): array
    {
        $level = null;

        if($this->course->getLevel()) {
            $level = (new LevelUserMapper($this->course->getLevel()))->toEndpointFormat();
        }

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

            Dictionary::LEVEL           => $level
        ];
    }

    public function jsonSerialize()
    {
        return $this->toEndpointFormat();
    }
}