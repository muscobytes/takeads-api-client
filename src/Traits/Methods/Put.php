<?php

namespace Muscobytes\TakeadsApi\Traits\Methods;

trait Put
{
    public function getHttpMethod(): string
    {
        return 'PUT';
    }
}