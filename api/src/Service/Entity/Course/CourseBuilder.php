<?php

namespace App\Service\Entity\Course;

use App\Service\Object\AbstractObjectBuilder;
use DateTime;
use DateTimeZone;
use Exception;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CourseBuilder extends AbstractObjectBuilder
{
    /**
     * @return array
     * @throws Exception
     */
    protected function getDefaults(): array
    {
        return [
            CourseDictionary::REPOSITORY_URL  => '',
            CourseDictionary::LANGUAGE        => 'en',
            CourseDictionary::PRICE           => 0,
            CourseDictionary::TITLE           => '',
            CourseDictionary::AUTHOR          => '',
            CourseDictionary::NAME            => '',
            CourseDictionary::RELEASE_DATE    => new DateTime('now', new DateTimeZone('UTC')),
            CourseDictionary::URL             => '',
            CourseDictionary::DURATION        => '',
        ];
    }

    protected function preBuildObjectHook(array &$data)
    {
        try {
            $data[CourseDictionary::RELEASE_DATE] = new DateTime($data[CourseDictionary::RELEASE_DATE]);
        } catch (Exception $e) {
            throw new BadRequestHttpException("Release date should be a correct date time string.");
        }

        $data[CourseDictionary::IS_REVIEWED] = false;
    }
}
