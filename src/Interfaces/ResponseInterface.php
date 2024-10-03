<?php

namespace Muscobytes\TakeAdsApi\Interfaces;

use Generator;
use Psr\Http\Message\ResponseInterface as HttpResponseInterface;

interface ResponseInterface
{
    public static function fromResponse(HttpResponseInterface $response): ResponseInterface|Generator;
}