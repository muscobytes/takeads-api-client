<?php

namespace Muscobytes\TakeadsApi\Traits;

trait ToArray
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
        return $transformBoolean ?
            $this->transformBoolean(get_object_vars($this)) :
            $this->removeNullValues(get_object_vars($this))
            ;
    }
}