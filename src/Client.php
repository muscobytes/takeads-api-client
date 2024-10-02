<?php

namespace Muscobytes\TakeAdsApi;


use Generator;
use Muscobytes\HttpClient\Interface\HttpClientInterface;
use Muscobytes\HttpClient\Middleware\Authentication\BearerMiddleware;
use Muscobytes\HttpClient\Middleware\ContentTypeMiddleware;
use Muscobytes\HttpClient\Middleware\Payload\JsonMiddleware;
use Muscobytes\TakeAdsApi\Dto\RequestDto;
use Muscobytes\TakeAdsApi\Dto\ResponseDto;
use Muscobytes\TakeAdsApi\Factory\HttpClientFactory;

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
    }


    public function call(RequestDto $request): ResponseDto|Generator
    {
        $this->middlewares = [
            new BearerMiddleware($this->publicKey),
            new ContentTypeMiddleware('application/json'),
            new JsonMiddleware($request->toArray())
        ];

        return $request->makeResponseDto(
            $this->client->request(
                $request->getHttpMethod(),
                $this->base_uri . $request->getUrlPath(),
                $this->middlewares,
            )
        );
    }
}