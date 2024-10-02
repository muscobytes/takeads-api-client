<?php

namespace Muscobytes\TakeAdsApi\Dto;

use Generator;
use Psr\Http\Message\ResponseInterface;

abstract class RequestDto
{
    abstract public function getHttpMethod(): string;

    abstract public function getUrlPath(): string;

    abstract public function makeResponseDto(ResponseInterface $response): ResponseDto|Generator;
}