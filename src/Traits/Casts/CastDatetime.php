<?php

namespace Muscobytes\TakeAdsApi\Traits\Casts;

use \DateTime;

trait CastDatetime
{
    const string FORMAT_ISO_8601 = 'Y-m-d\TH:i:s.vp';

    protected static function castDatetime(
        string $timestamp,
        string $format = self::FORMAT_ISO_8601
    ): DateTime|false
    {
        return DateTime::createFromFormat($format, $timestamp);
    }
}