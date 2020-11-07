<?php

namespace App\Services\Course;

use App\Entity\Course;
use App\Services\Validation\Helpers\ValidatesEntity;
use App\Services\Validation\ValidationException;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CourseUpdater
{
    use ValidatesEntity;

    private ValidatorInterface $validator;

    private Course $course;

    private array $data = [];

    private bool $isTerminated = false;

    /**
     * CourseUpdater constructor.
     *
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @return array
     */
    public function getDefaultData(): array
    {
        return [
            Dictionary::REPOSITORY_URL => null,
            Dictionary::LANGUAGE       => null,
            Dictionary::PRICE          => null,
            Dictionary::TITLE          => null,
            Dictionary::AUTHOR         => null,
            Dictionary::NAME           => null,
            Dictionary::RELEASE_DATE   => null,
            Dictionary::URL            => null,
            Dictionary::DURATION       => null,
        ];
    }

    /**
     * @param Course $course
     *
     * @return $this
     *
     * @throws Exception
     */
    public function setCourse(Course $course)
    {
        if(isset($this->course)) {
            throw new Exception("Only one entity per updater is allowed.");
        }

        if(!$course->getId()) {
            throw new Exception("Object should be stored in the database before any update.");
        }

        $this->course = $course;

        return $this;
    }

    /**
     * @throws Exception
     */
    private function checkIfEntityWasProvided()
    {
        if(!$this->course) {
            throw new Exception("Object should be provided before any update.");
        }
    }

    private function checkIfActionIsNotTerminated()
    {
        if($this->isTerminated) {
            throw new Exception("Object was already updated.");
        }
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = array_intersect_key($data, $this->getDefaultData());

        return $this;
    }

    /**
     * @throws ValidationException
     */
    public function update()
    {
        $this->checkIfActionIsNotTerminated();

        $this->checkIfEntityWasProvided();

        $this->applyDataToEntity();

        $this->validateFinalEntity();

        $this->terminate();
    }

    private function applyDataToEntity()
    {
        foreach ($this->data as $key => $value) {
            $setter = $this->getSetterNameForKey($key);

            call_user_func_array(array($this->course, $setter), array($value));
        }
    }

    /**
     * @throws ValidationException
     */
    private function validateFinalEntity()
    {
        $this->validateEntity($this->course, $this->validator);
    }

    /**
     * @param string $key
     *
     * @return string
     *
     * @throws Exception
     */
    private function getSetterNameForKey(string $key)
    {
        switch ($key) {
            case Dictionary::NAME:           return 'setName';
            case Dictionary::URL:            return 'setUrl';
            case Dictionary::DURATION:       return 'setDuration';
            case Dictionary::RELEASE_DATE:   return 'setReleaseDate';
            case Dictionary::AUTHOR:         return 'setAuthor';
            case Dictionary::TITLE:          return 'setTitle';
            case Dictionary::PRICE:          return 'setPrice';
            case Dictionary::LANGUAGE:       return 'setLanguage';
            case Dictionary::REPOSITORY_URL: return 'setRepositoryUrl';

            default: throw new Exception(
                sprintf("'%s' key doesn't have any existing equivalent.", $key)
            );
        }
    }

    private function terminate()
    {
        $this->isTerminated = true;
    }

}