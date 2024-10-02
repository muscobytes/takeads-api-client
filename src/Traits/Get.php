<?php

namespace Muscobytes\TakeAdsApi\Traits;

trait Get
{
    public function getHttpMethod(): string
    {
        return 'GET';
    }
}