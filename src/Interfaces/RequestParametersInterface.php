<?php

namespace Muscobytes\TakeadsApi\Interfaces;

interface RequestParametersInterface
{
    public function toArray(bool $transformBoolean): array;
}