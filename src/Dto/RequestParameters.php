<?php

namespace Muscobytes\TakeAdsApi\Dto;

use Muscobytes\TakeAdsApi\Interfaces\RequestParametersInterface;

abstract readonly class RequestParameters implements RequestParametersInterface
{
    public function removeNullValues(array $parameters): array
    {
        foreach ($parameters as $key => $value) {
            if (is_null($value)) {
                unset($parameters[$key]);
            }
        }
        return $parameters;
    }


    public function toArray(): array
    {
        return get_object_vars($this);
    }
}