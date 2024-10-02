<?php

namespace Muscobytes\TakeAdsApi\Tests\Unit;

use Muscobytes\HttpClient\Interface\HttpClientInterface;
use Muscobytes\TakeAdsApi\Client;
use Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\ResolveRequestDto;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Client::class)]
class ClientTest extends TestCase
{
    public function testSuccessfulRequest()
    {
        $apiClient = new Client(
            'public_key',
            'https://api.takeads.com',
            $this->getMockBuilder(HttpClientInterface::class)
                ->getMock()
        );
        $request = new ResolveRequestDto(
            [
                'https://temu.com'
            ],
            'subid',
            true
        );
        $response = $apiClient->call($request);
        $this->assertInstanceOf(\Generator::class, $response);
    }
}