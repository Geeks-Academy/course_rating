<?php

namespace App\Services;

use JsonSerializable;

interface Mapper extends JsonSerializable
{
    public function toEndpointFormat(): array;
}