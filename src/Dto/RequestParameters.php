<?php

namespace Muscobytes\TakeAdsApi\Dto;

use Muscobytes\TakeAdsApi\Interfaces\RequestParametersInterface;

abstract readonly class RequestParameters implements RequestParametersInterface
{
    public function removeNullValues(array $parameters): array
    {
        return array_filter(
            $parameters,
            fn ($parameter) => !is_null($parameter)
        );
    }


    /**
     * Transforms boolean values into string
     * @param array $array
     * @return array
     */
    public function transformBoolean(array $array): array
    {
        return array_map(
            fn ($value) => is_bool($value) ? $value ? 'true' : 'false' : $value,
            $array
        );
    }


    public function toArray(bool $transformBoolean = false): array
    {
        return $transformBoolean ? $this->transformBoolean(get_object_vars($this)) : get_object_vars($this);
    }
}