<?php

namespace App\Service\Object;

use App\Service\Object\Helper\MergesDataTrait;
use App\Service\Object\Helper\ObjectDataSetterTrait;
use App\Service\Validation\Helpers\ValidatesObject;
use App\Service\Validation\ValidationException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class AbstractObjectBuilder
{
    use ObjectDataSetterTrait;
    use MergesDataTrait;
    use ValidatesObject;

    private bool $isCreated = false;

    protected object $object;

    protected array $data = [];

    protected ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator, object $object)
    {
        $this->validator = $validator;
        $this->object = $object;
    }

    /**
     * Override this to create your own object data mapping
     *
     * @return array
     */
    abstract protected function getDefaults(): array;

    /**
     * Resolve any attribute by default because api
     * may provide nullable but still required data
     *
     * @param string $key
     * @param $value
     * @return bool
     */
    protected function shouldObjectDataSetterResolveAttribute(string $key, $value): bool
    {
        return true;
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
    protected function getData(): array
    {
        return $this->data;
    }

    /**
     * This is a place where you can change data before any action execute
     *
     * @param object $entity
     * @param array $data
     */
    protected function preBuildObjectHook(object $entity, array &$data) {}

    /**
     * @throws ValidationException
     */
    public function build(): object
    {
        /**
         * CourseBuilder should build and validate object only once per entity
         */
        if($this->isCreated) {
            return $this->object;
        }

        $data = $this->getData();

        $this->preBuildObjectHook($this->object, $data);

        $this->objectSetterDataToObject($this->object, $data);

        /**
         * Check if appended data pass entity validation
         */
        $this->validateObject(
            $this->object, $this->validator
        );

        $this->isCreated = true;

        return $this->object;
    }
}