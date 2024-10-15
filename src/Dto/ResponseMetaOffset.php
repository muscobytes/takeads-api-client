<?php

namespace Muscobytes\TakeadsApi\Dto;

final class ResponseMetaOffset
{
    public function __construct(
        public int $offset,
        public int $limit,
        public int $total
    )
    {
        //
    }
}