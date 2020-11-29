<?php

namespace App\Service\Entity\Course;

use App\Service\Object\AbstractObjectUpdater;
use DateTime;
use Exception;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CourseUpdater extends AbstractObjectUpdater
{
    /**
     * @return array
     */
    public function getAvailable(): array
    {
        return [
            CourseDictionary::REPOSITORY_URL,
            CourseDictionary::LANGUAGE,
            CourseDictionary::PRICE,
            CourseDictionary::TITLE,
            CourseDictionary::AUTHOR,
            CourseDictionary::NAME,
            CourseDictionary::RELEASE_DATE,
            CourseDictionary::URL,
            CourseDictionary::DURATION,
        ];
    }

    protected function preUpdateObjectHook(array &$data)
    {
        if(key_exists(CourseDictionary::RELEASE_DATE, $data)) {
            try {
                $data[CourseDictionary::RELEASE_DATE] = new DateTime($data[CourseDictionary::RELEASE_DATE]);
            } catch (Exception $e) {
                throw new BadRequestHttpException("Release date should be a correct date time string.");
            }
        }
    }
}
