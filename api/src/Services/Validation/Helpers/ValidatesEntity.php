<?php

namespace App\Services\Validation\Helpers;

use App\Services\Validation\ValidationException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

trait ValidatesEntity
{
    /**
     * @param object $entity
     * @param ValidatorInterface $validator
     * @throws ValidationException
     */
    protected function validateEntity(object $entity, ValidatorInterface $validator)
    {
        $errors = $validator->validate($entity);

        if($errors->count() > 0) {
            $exception = new ValidationException("Validation exception occurred");

            $exception->setErrors(iterator_to_array($errors, true));

            throw $exception;
        }
    }
}