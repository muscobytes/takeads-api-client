<?php

namespace Muscobytes\TakeAdsApi\Dto;

readonly class ResponseMetaNext
{
    public function __construct(
        public string $next
    )
    {
        //
    }
}