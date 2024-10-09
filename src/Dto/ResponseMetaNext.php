<?php

namespace Muscobytes\TakeadsApi\Dto;

readonly class ResponseMetaNext
{
    public function __construct(
        public string $next
    )
    {
        //
    }
}