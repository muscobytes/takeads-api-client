<?php

namespace Muscobytes\TakeAdsApi\Interfaces;

use Generator;

interface ResponseInterface
{
    public static function fromResponse(\Psr\Http\Message\ResponseInterface $response): ResponseInterface|Generator;
}