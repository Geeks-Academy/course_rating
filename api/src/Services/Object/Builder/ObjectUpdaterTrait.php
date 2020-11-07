<?php

namespace App\Services\Object\Builder;

use App\Services\Object\Helpers\FiltersDataTrait;
use App\Services\Object\Helpers\ObjectDataSetterTrait;
use App\Services\Validation\Helpers\ValidatesEntity;
use App\Services\Validation\ValidationException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class ObjectUpdaterTrait
{
    use ObjectDataSetterTrait;
    use FiltersDataTrait;
    use ValidatesEntity;

    protected object $entity;

    protected array $data = [];

    protected ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator, object $entity)
    {
        $this->validator = $validator;
        $this->entity = $entity;
    }

    /**
     * Should return array of data keys which
     * will be taken into account during data updating
     *
     * @return array
     */
    public function getAvailable(): array
    {
        return [];
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): self
    {
        $this->data = $this->filter($this->getAvailable(), $data);

        return $this;
    }

    /**
     * This is a place where you can change data before any action execute
     *
     * @param object $entity
     * @param array $data
     */
    protected function preUpdateEntityHook(object $entity, array &$data) {}

    /**
     * @return object
     * @throws ValidationException
     */
    public function update(): object
    {
        $data = $this->getData();

        $this->preUpdateEntityHook($this->entity, $data);

        $this->appendDataToEntity($this->entity, $data);

        /**
         * Check if appended data pass entity validation
         */
        $this->validateEntity($this->entity, $this->validator);

        return $this->entity;
    }
}