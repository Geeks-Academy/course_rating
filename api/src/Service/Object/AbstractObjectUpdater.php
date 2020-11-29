<?php

namespace App\Service\Object;

use App\Service\Object\Helper\FiltersDataTrait;
use App\Service\Object\Helper\ObjectDataSetterTrait;
use App\Service\Validation\Helpers\ValidatesObject;
use App\Service\Validation\ValidationException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class AbstractObjectUpdater
{
    use ObjectDataSetterTrait;
    use FiltersDataTrait;
    use ValidatesObject;

    protected object $object;

    protected array $data = [];

    protected ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator, object $object)
    {
        $this->validator = $validator;
        $this->object = $object;
    }

    /**
     * Should return array of data keys which
     * will be taken into account during data updating
     *
     * @return array
     */
    abstract public function getAvailable(): array;

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
     * This is a place where you can modify data before any action execute
     *
     * @param array $data
     */
    protected function preUpdateObjectHook(array &$data) {}

    /**
     * @return object
     * @throws ValidationException
     */
    public function update(): object
    {
        $data = $this->getData();

        $this->preUpdateObjectHook($data);

        $this->objectSetterDataToObject($this->object, $data);

        /**
         * Check if appended data pass object validation
         */
        $this->validateObject($this->object, $this->validator);

        return $this->object;
    }
}
