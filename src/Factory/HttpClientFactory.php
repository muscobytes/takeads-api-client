<?php
declare(strict_types=1);

namespace Muscobytes\TakeadsApi\Factory;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Muscobytes\HttpClient\HttpClient;
use Muscobytes\HttpClient\Interface\HttpClientInterface;

final class HttpClientFactory
{
    public static function create(): HttpClientInterface
    {
        return new HttpClient(
            Psr18ClientDiscovery::find(),
            Psr17FactoryDiscovery::findRequestFactory()
        );
    }
}
