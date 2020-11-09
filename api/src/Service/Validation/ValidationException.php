<?php

namespace App\Service\Validation;

use Exception;

class ValidationException extends Exception
{
    private array $errors;

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors(array $errors): void
    {
        $this->errors = $errors;
    }
}