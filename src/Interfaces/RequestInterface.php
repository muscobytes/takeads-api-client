<?php

namespace Muscobytes\TakeadsApi\Interfaces;

use Muscobytes\TakeadsApi\Dto\Response;
use Psr\Http\Message\ResponseInterface;

interface RequestInterface
{
    public function __construct(RequestParametersInterface $parameters);

    public function getHttpMethod(): string;

    public function getUrlPath(): string;

    public function getQueryParams(): array;

    public function getHeaders(): array;

    public function getBody(): string;

    public function makeResponse(ResponseInterface $response): Response;
}