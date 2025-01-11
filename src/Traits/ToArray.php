<?php

namespace Muscobytes\TakeadsApi\Traits;

trait ToArray
{
    public function transformArray(
        array $array,
        bool $transformBoolean,
        string $format = 'Y-m-d'
    ): array
    {
        return array_map(
            fn (mixed $element) => match(gettype($element)) {
                'boolean' => $transformBoolean ? $element ? 'true' : 'false' : $element,
                'object' => match(get_class($element)) {
                    'DateTime' => $element->format($format),
                    default => $element->toArray()
                },
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
