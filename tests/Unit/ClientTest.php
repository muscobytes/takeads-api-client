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
        //
    }
}