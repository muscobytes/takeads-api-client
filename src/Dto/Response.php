<?php

namespace Muscobytes\TakeAdsApi\Dto;


use Muscobytes\TakeAdsApi\Interfaces\ResponseInterface;
use Psr\Http\Message\ResponseInterface as HttpResponseInterface;

abstract class Response implements ResponseInterface
{
    public function __construct(
        protected HttpResponseInterface $response
    )
    {
        //
    }

    public function getResponse(): HttpResponseInterface
    {
        return $this->response;
    }
}