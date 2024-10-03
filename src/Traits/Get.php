<?php

namespace Muscobytes\TakeAdsApi\Traits;

trait Get
{
    public function getHttpMethod(): string
    {
        return 'GET';
    }


    public function getQueryParams(): array
    {
        return $this->parameters->removeNullValues(
            $this->parameters->toArray(transformBoolean: true)
        );
    }
}