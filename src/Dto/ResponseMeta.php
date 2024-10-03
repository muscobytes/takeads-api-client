<?php

namespace Muscobytes\TakeAdsApi\Dto;

readonly class ResponseMeta
{
    public function __construct(
        public string $next,
    )
    {
        //
    }
}