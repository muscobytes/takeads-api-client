<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Resolve;

use Generator;
use Muscobytes\TakeadsApi\Dto\Response;

/**
 * Get affiliate link
 * https://developers.takeads.com/knowledge-base/article/get-affiliate-link
 */
final class ResolveResponse extends Response
{
    public function getData(): Generator
    {
        yield array_map(
            fn (array $item) => AffiliateLinkDto::fromArray($item),
            json_decode($this->getResponse()->getBody(), true)['data']
        );
    }
}
