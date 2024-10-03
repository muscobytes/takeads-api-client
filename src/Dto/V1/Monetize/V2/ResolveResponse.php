<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2;

use Generator;
use Muscobytes\TakeAdsApi\Dto\Response;
use Psr\Http\Message\ResponseInterface as HttpResponseInterface;

/**
 * Get affiliate link
 * https://developers.takeads.com/knowledge-base/article/get-affiliate-link
 */
readonly class ResolveResponse extends Response
{
    public static function fromResponse(HttpResponseInterface $response): Generator
    {
        foreach(json_decode($response->getBody(), true)['data'] as $item) {
            yield new AffiliateLinkDto(...$item);
        }
    }
}
