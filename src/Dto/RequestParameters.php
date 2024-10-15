<?php

namespace Muscobytes\TakeadsApi\Dto;

use Muscobytes\TakeadsApi\Interfaces\RequestParametersInterface;
use Muscobytes\TakeadsApi\Traits\toArray;

abstract readonly class RequestParameters implements RequestParametersInterface
{
    use toArray;
}