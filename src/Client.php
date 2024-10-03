<?php

namespace Muscobytes\TakeAdsApi;


use Generator;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Exceptions\ClientException;
use Muscobytes\TakeAdsApi\Exceptions\ServerErrorException;
use Muscobytes\TakeAdsApi\Exceptions\ServiceUnavailableException;
use Muscobytes\TakeAdsApi\Exceptions\UnknownErrorException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Muscobytes\TakeAdsApi\Interfaces\RequestInterface;


class Client
{
    protected array $headers = [];


    public function __construct(
        protected readonly string $publicKey,
        protected readonly string $base_uri = 'https://api.takeads.com',
        protected ?ClientInterface $client = null,
        protected ?RequestFactoryInterface $requestFactory = null,
        protected ?StreamFactoryInterface $streamFactory = null
    )
    {
        $this->headers['Authorization'] = 'Bearer ' . $this->publicKey;
        $this->client = $client ?: Psr18ClientDiscovery::find();
        $this->requestFactory = $requestFactory ?: Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = $streamFactory ?: Psr17FactoryDiscovery::findStreamFactory();
    }


    /**
     * @throws ClientExceptionInterface
     * @throws ServiceUnavailableException
     * @throws ServerErrorException
     * @throws ClientException
     * @throws UnknownErrorException
     */
    public function call(RequestInterface $command): Response|Generator
    {
        $uri = $this->requestFactory->createUri($this->base_uri)
            ->withPath($command->getUrlPath())
            ->withQuery(http_build_query($command->getQueryParams()));

        $request = $this->requestFactory->createRequest(
            $command->getHttpMethod(),
            $uri
        );

        foreach (array_merge($this->headers, $command->getHeaders()) as $key => $value) {
            $request = $request->withHeader($key, $value);
        }

        $request = $request->withBody(
            $this->streamFactory->createStream(
                $command->getBody()
            )
        );

        $response = $this->client->sendRequest($request);

        if (in_array($response->getStatusCode(), range(501, 511))) {
            throw new ServiceUnavailableException($response->getReasonPhrase(), $response->getStatusCode());
        } elseif ($response->getStatusCode() === 500) {
            throw new ServerErrorException($response->getReasonPhrase(), $response->getStatusCode());
        } elseif (in_array($response->getStatusCode(), range(400, 499))) {
            throw new ClientException($response->getReasonPhrase(), $response->getStatusCode());
        } elseif (
            !in_array($response->getStatusCode(), [200, 201])
        ) {
            throw new UnknownErrorException($response->getReasonPhrase(), $response->getStatusCode());
        }

        return $command->makeResponseDto($response);
    }
}