<?php

namespace Muscobytes\TakeadsApi;


use Generator;
use Muscobytes\HttpClient\Interface\HttpClientInterface;
use Muscobytes\HttpClient\Middleware\Authentication\BearerMiddleware;
use Muscobytes\TakeAdsApi\Dto\RequestDto;
use Muscobytes\TakeAdsApi\Dto\ResponseDto;
use Muscobytes\TakeAdsClient\Factory\HttpClientFactory;

class Client
{
    protected array $middlewares;

    public function __construct(
        protected readonly string $publicKey,
        protected readonly string $base_uri = 'https://api.takeads.com',
        protected ?HttpClientInterface $client = null,
    )
    {
        if (!$this->client) {
            $this->client = HttpClientFactory::create();
        }
        $this->middlewares[] = new BearerMiddleware($this->publicKey);
    }


    public function call(RequestDto $request): ResponseDto|Generator
    {
        return $request->makeResponseDto(
            $this->client->request(
                $request->getHttpMethod(),
                $this->base_uri . $request->getUrlPath(),
                $this->middlewares
            )
        );
    }
}