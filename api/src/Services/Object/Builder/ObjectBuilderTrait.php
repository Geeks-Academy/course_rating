<?php

namespace App\Services\Object\Builder;

use App\Services\Object\Helpers\MergesDataTrait;
use App\Services\Object\Helpers\ObjectDataSetterTrait;
use App\Services\Validation\Helpers\ValidatesEntity;
use App\Services\Validation\ValidationException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class ObjectBuilderTrait
{
    use ObjectDataSetterTrait;
    use MergesDataTrait;
    use ValidatesEntity;

    private bool $isCreated = false;

    protected object $entity;

    protected array $data = [];

    protected ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator, object $entity)
    {
        $this->validator = $validator;
        $this->entity = $entity;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setData(array $data): self
    {
        $this->data = $this->merge($this->getDefaults(), $data);

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
     * This is a place where you can change data before any action execute
     *
     * @param object $entity
     * @param array $data
     */
    public function preBuildEntityHook(object $entity, array &$data) {}

    /**
     * @throws ValidationException
     */
    public function build(): object
    {
        /**
         * CourseBuilder should build and validate object only once per entity
         */
        if($this->isCreated) {
            return $this->entity;
        }

        $data = $this->getData();

        $this->preBuildEntityHook($this->entity, $data);

        $this->appendDataToEntity($this->entity, $data);

        /**
         * Check if appended data pass entity validation
         */
        $this->validateEntity(
            $this->entity, $this->validator
        );

        $this->isCreated = true;

        return $this->entity;
    }
}