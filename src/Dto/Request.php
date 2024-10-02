<?php

namespace Muscobytes\TakeAdsApi\Dto;

use Generator;
use Muscobytes\TakeAdsApi\Interfaces\RequestInterface;
use Muscobytes\TakeAdsApi\Interfaces\RequestParametersInterface;
use Psr\Http\Message\ResponseInterface;

abstract class Request implements RequestInterface
{
    protected string $path = '';

    protected array $headers = [];


    public function __construct(
        protected RequestParametersInterface $parameters
    )
    {
        //
    }


    public function getUrlPath(): string
    {
        return $this->path;
    }


    public function getQueryParams(): array
    {
        return [];
    }


    public function getHeaders(): array
    {
        return $this->headers;
    }


    public function getBody(): string
    {
        return '';
    }

    abstract public function makeResponseDto(ResponseInterface $response): Response|Generator;
}