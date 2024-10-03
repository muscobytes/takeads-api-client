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
    public function __construct(
        protected HttpResponseInterface $response
    )
    {
        //
    }


    public function getPayload(): Generator
    {
        foreach (json_decode($this->response->getBody(), true)['data'] as $item) {
            yield new AffiliateLinkDto(...$item);
        }
    }
}
