<?php

namespace Muscobytes\TakeadsApi\Interfaces;

interface RequestParametersInterface
{
    public function removeNullValues(array $parameters): array;

    public function toArray(bool $transformBoolean): array;
}