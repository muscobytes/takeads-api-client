<?php

namespace Muscobytes\TakeAdsApi\Dto;

use Generator;
use Psr\Http\Message\ResponseInterface;

abstract class ResponseDto
{
    abstract public static function fromResponse(ResponseInterface $response): ResponseDto|Generator;
}