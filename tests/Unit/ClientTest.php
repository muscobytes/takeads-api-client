<?php

namespace Muscobytes\TakeAdsApi\Tests\Unit;

use Http\Discovery\Psr17Factory;
use Muscobytes\TakeAdsApi\Client;
use Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Resolve\ResolveRequest;
use Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Resolve\ResolveRequestParameters;
use Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Resolve\ResolveResponse;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Http\Mock\Client as MockClient;

#[CoversClass(Client::class)]
class ClientTest extends TestCase
{
    public function testSuccessfulRequest()
    {
        $mockHttpClient = new MockClient();
        $apiClient = new Client(
            'public-key',
            'http://localhost',
            $mockHttpClient
        );

        $factory = new Psr17Factory();
        $response = $factory->createResponse(200, 'OK')
            ->withBody($factory->createStream(json_encode(['key' => 'value'])));
        $mockHttpClient->addResponse($response);

        $resolveRequestParameters = new ResolveRequestParameters([
            'https://aliexpress.com',
            'https://temu.com'
        ]);
        $resolveRequest = new ResolveRequest($resolveRequestParameters);
        $response = $apiClient->call($resolveRequest);
        $this->assertInstanceOf(ResolveResponse::class, $response);
    }
}