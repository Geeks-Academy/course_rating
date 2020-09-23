<?php

namespace App\Services\Course;

use App\Services\Validation\Helpers\ValidatesEntity;
use DateTime;
use Exception;
use App\Entity\Course;
use App\Services\Validation\ValidationException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class Builder
 *
 * @package App\Services\Course
 */
final class Builder
{
    use ValidatesEntity;

    /**
     * @var array
     */
    private array $data;

    /**
     * @var Course
     */
    private Course $entity;

    /**
     * @var ValidatorInterface
     */
    private ValidatorInterface $validator;

    /**
     * Builder constructor.
     *
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->entity = new Course();
        $this->data = $this->getDefaultData();
        $this->validator = $validator;
    }

    /**
     * @return array
     */
    public function getDefaultData(): array
    {
        return [
            Dictionary::REPOSITORY_URL  => '',
            Dictionary::LANGUAGE        => 'en',
            Dictionary::PRICE           => 0,
            Dictionary::TITLE           => '',
            Dictionary::AUTHOR          => '',
            Dictionary::NAME            => '',
            Dictionary::RELEASE_DATE    => new DateTime('now'),
            Dictionary::URL             => '',
            Dictionary::DURATION        => '',
        ];
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setData(array $data): self
    {
        $this->data = array_merge(
            $this->getDefaultData(), array_intersect_key($data, $this->getDefaultData())
        );

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return Course
     *
     * @throws Exception|ValidationException
     */
    public function createCourseWithUserPermissions(): Course
    {
        $this->checkIfEntityHasBeenCreated();

        $this->entity->setIsReviewed(false);

        $this->applyDataToEntity();

        $this->validateFinalEntity();

        return $this->retrieveEntity();
    }

    /**
     * @return Course
     *
     * @throws Exception|ValidationException
     */
    public function createCourseWithAdminPermissions(): Course
    {
        $this->checkIfEntityHasBeenCreated();

        $this->entity->setIsReviewed(true);

        $this->applyDataToEntity();

        $this->validateFinalEntity();

        return $this->retrieveEntity();
    }

    public function applyDataToEntity()
    {
        $data = $this->getData();

        $this->entity
            ->setRepositoryUrl($data[Dictionary::REPOSITORY_URL])
            ->setLanguage($data[Dictionary::LANGUAGE])
            ->setPrice($data[Dictionary::PRICE])
            ->setTitle($data[Dictionary::TITLE])
            ->setAuthor($data[Dictionary::AUTHOR])
            ->setName($data[Dictionary::NAME])
            ->setReleaseDate($data[Dictionary::RELEASE_DATE])
            ->setDuration($data[Dictionary::DURATION])
            ->setUrl($data[Dictionary::URL]);
    }

    /**
     * @throws Exception
     */
    private function checkIfEntityHasBeenCreated(): void
    {
        if(!$this->entity) {
            throw new Exception("Entity has been already created!");
        }
    }

    /**
     * @throws ValidationException
     */
    private function validateFinalEntity(): void
    {
        $this->validateEntity($this->entity, $this->validator);
    }

    private function retrieveEntity(): Course
    {
        $entity = $this->entity;

        unset($this->entity);

        return $entity;
    }

    public function reinitialize(): self
    {
        return new self($this->validator);
    }
}