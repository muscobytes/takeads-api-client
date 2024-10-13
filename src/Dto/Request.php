<?php

namespace Muscobytes\TakeadsApi\Dto;

use Muscobytes\TakeadsApi\Interfaces\RequestInterface;
use Muscobytes\TakeadsApi\Interfaces\RequestParametersInterface;

abstract class Request implements RequestInterface
{
    private array $headers = [];


    public function __construct(
        string $bearerToken,
        protected RequestParametersInterface $parameters
    )
    {
        $this->headers['Authorization'] = 'Bearer ' . $bearerToken;
    }


    public function getUrlPath(): string
    {
        return $this->path;
    }


    public function getQueryParams(): array
    {
        return [];
    }


    public function setHeader(string $name, string $value): self
    {
        $this->headers[$name] = $value;
        return $this;
    }


    public function getHeaders(): array
    {
        return $this->headers;
    }


    public function getBody(): string
    {
        return '';
    }
}
