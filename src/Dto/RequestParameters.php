<?php

namespace Muscobytes\TakeadsApi\Dto;

use Muscobytes\TakeadsApi\Interfaces\RequestParametersInterface;
use Muscobytes\TakeadsApi\Traits\ToArray;

abstract class RequestParameters implements RequestParametersInterface
{
    use ToArray;
}
