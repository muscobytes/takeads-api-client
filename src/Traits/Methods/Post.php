<?php

namespace Muscobytes\TakeAdsApi\Traits\Methods;

trait Post
{
    public function getHttpMethod(): string
    {
        return 'POST';
    }
}