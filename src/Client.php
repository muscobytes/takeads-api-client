<?php

namespace Muscobytes\TakeAdsApi;


use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Exceptions\ClientErrorException;
use Muscobytes\TakeAdsApi\Exceptions\ServerErrorException;
use Muscobytes\TakeAdsApi\Exceptions\ServiceUnavailableException;
use Muscobytes\TakeAdsApi\Exceptions\UnknownErrorException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Muscobytes\TakeAdsApi\Interfaces\RequestInterface;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\RequestInterface as HttpRequestInterface;


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


    public function createUri(RequestInterface $command): UriInterface
    {
        return $this->requestFactory->createUri($this->base_uri)
            ->withPath($command->getUrlPath())
            ->withQuery(http_build_query($command->getQueryParams()));
    }


    public function createRequest(RequestInterface $command): HttpRequestInterface
    {
        $request = $this->requestFactory->createRequest(
            $command->getHttpMethod(),
            $this->createUri($command)
        );
        $request = $this->addHeaders($request, $command);
        return $this->addBody($request, $command);
    }


    public function addHeaders(HttpRequestInterface $request, RequestInterface $command): HttpRequestInterface
    {
        foreach (array_merge($this->headers, $command->getHeaders()) as $key => $value) {
            $request = $request->withHeader($key, $value);
        }
        return $request;
    }


    public function addBody(HttpRequestInterface $request, RequestInterface $command): HttpRequestInterface
    {
        return $request->withBody(
            $this->streamFactory->createStream(
                $command->getBody()
            )
        );
    }


    /**
     * @throws ServiceUnavailableException
     * @throws ServerErrorException
     * @throws ClientErrorException
     * @throws UnknownErrorException
     */
    public function call(RequestInterface $command): Response
    {
        $request = $this->createRequest($command);

        try {
            $response = $this->client->sendRequest($request);
        } catch (ClientExceptionInterface $e) {
            throw new ClientErrorException($e->getMessage(), $e->getCode(), $e);
        }

        if (in_array($response->getStatusCode(), range(501, 511))) {
            throw new ServiceUnavailableException($response->getReasonPhrase(), $response->getStatusCode());
        } elseif ($response->getStatusCode() === 500) {
            throw new ServerErrorException($response->getReasonPhrase(), $response->getStatusCode());
        } elseif (in_array($response->getStatusCode(), range(400, 499))) {
            throw new ClientErrorException($response->getReasonPhrase(), $response->getStatusCode());
        } elseif (
            !in_array($response->getStatusCode(), [200, 201])
        ) {
            throw new UnknownErrorException($response->getReasonPhrase(), $response->getStatusCode());
        }

        return $command->makeResponse($response);
    }
}