<?php

namespace App\Service\Validation\Helpers;

use App\Service\Validation\ValidationException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

trait ValidatesObject
{
    /**
     * @param object $entity
     * @param ValidatorInterface $validator
     * @throws ValidationException
     */
    protected function validateObject(object $entity, ValidatorInterface $validator)
    {
        $errors = $validator->validate($entity);

        if($errors->count() > 0) {
            $exception = new ValidationException("Validation exception occurred");

            $exception->setErrors(iterator_to_array($errors, true));

            throw $exception;
        }
    }
}