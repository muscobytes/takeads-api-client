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
     * @param array $parameters
     * @return array
     */
    public function transformBoolean(array $parameters): array
    {
        $result = [];
        foreach ($parameters as $key => $value) {
            if (is_bool($value)) {
                $result[$key] = $value ? 'true' : 'false';
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }


    public function toArray(bool $transformBoolean = false): array
    {
        return $transformBoolean ? $this->transformBoolean(get_object_vars($this)) : get_object_vars($this);
    }
}