<?php

namespace Muscobytes\TakeadsApi\Traits\Parameters;

trait CastParameters
{
    public static function cast(string $name, mixed $value)
    {
        $methodName = 'Cast' . ucfirst(self::$cast[$name]);
        return self::$methodName($value);
    }


    public static function castParameters(array $array): array
    {
        return array_map(
            function ($propertyName) use ($array) {
                return key_exists($propertyName, $array)
                    ? key_exists($propertyName, self::$cast)
                        ? self::cast($propertyName, $array[$propertyName])
                        : $array[$propertyName]
                    : null
                    ;
            },
            static::$properties
        );
    }

}