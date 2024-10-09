<?php

namespace Muscobytes\TakeadsApi\Traits\Methods;

trait Post
{
    public function getHttpMethod(): string
    {
        return 'POST';
    }
}