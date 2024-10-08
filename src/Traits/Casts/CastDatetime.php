<?php

namespace Muscobytes\TakeAdsApi\Traits\Casts;

use \DateTime;

trait CastDatetime
{
    const string DATE_FORMAT = 'Y-m-d\TH:i:s.vp';

    protected static function castDatetime(string $timestamp): DateTime|false
    {
        return DateTime::createFromFormat(self::DATE_FORMAT, $timestamp);
    }
}