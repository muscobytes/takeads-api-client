<?php

namespace Muscobytes\TakeAdsApi\Interfaces;

use Generator;
use Muscobytes\TakeAdsApi\Dto\Response;
use Psr\Http\Message\ResponseInterface;

interface RequestInterface
{
    public function __construct(RequestParametersInterface $parameters);

    public function getHttpMethod(): string;

    public function getUrlPath(): string;

    public function getQueryParams(): array;

    public function getHeaders(): array;

    public function getBody(): string;

    public function makeResponseDto(ResponseInterface $response): Response|Generator;
}