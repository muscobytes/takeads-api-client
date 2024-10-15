<?php

namespace Muscobytes\TakeadsApi\Traits;

trait ToArray
{
    public function transformArray(
        array $array,
        bool $transformBoolean
    ): array
    {
        return array_map(
            fn (mixed $element) => match(gettype($element)) {
                'boolean' => $transformBoolean ? $element ? 'true' : 'false' : $element,
                'object' => $element->toArray(),
                'array' => $this->transformArray($element, $transformBoolean),
                default => $element
            },
            $array
        );
    }


    public function toArray(
        bool $transformBoolean = false,
        bool $removeNullValues = true
    ): array
    {
        return array_filter(
            $this->transformArray(get_object_vars($this), $transformBoolean),
            fn ($value) => !$removeNullValues || !is_null($value)
        );
    }
}
