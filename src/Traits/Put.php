<?php

namespace Muscobytes\TakeAdsApi\Traits;

trait Put
{
    public function getHttpMethod(): string
    {
        return 'PUT';
    }
}