<?php

namespace Muscobytes\TakeadsApi\Traits\Casts;

use DateTime;

trait CastDatetime
{
    public static string $FORMAT_ISO_8601 = 'Y-m-d\TH:i:s.vp';

    protected static function castDatetime(
        string $timestamp,
        string $format = null
    ): DateTime|false
    {
        return DateTime::createFromFormat(
            is_null($format) ? static::$FORMAT_ISO_8601 : $format,
            $timestamp
        );
    }
}