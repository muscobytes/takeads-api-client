<?php

namespace Muscobytes\TakeadsApi\Traits\Casts;

use DateTime;
use DateTimeInterface;

trait CastDatetime
{
    public static string $FORMAT_ISO_8601 = 'Y-m-d\TH:i:s.vp';

    public static string $FORMAT_DATE_ISO_8601_1988E  = 'Y-m-d';


    protected static function createFromFormat(
        string $format,
        string $string
    ): bool|DateTimeInterface
    {
        return DateTime::createFromFormat($format, $string);
    }


    protected static function castDatetime(
        string $string
    ): bool|DateTimeInterface
    {
        return self::createFromFormat(static::$FORMAT_ISO_8601, $string);
    }


    protected static function castDate(
        string $string,
    ): bool|DateTimeInterface
    {
        return self::createFromFormat(self::$FORMAT_DATE_ISO_8601_1988E, $string);
    }
}