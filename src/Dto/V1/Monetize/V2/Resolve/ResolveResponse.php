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
    public function getPayload(): array
    {
        return array_map(
            fn (array $item) => AffiliateLinkDto::fromArray($item),
            $this->getData()
        );
    }
}
