<?php

namespace Muscobytes\TakeAdsApi\Dto\V3\Api\Stats\Action;

use Generator;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Traits\HasMetaOffset;

/**
 * Get report on clicks
 * https://developers.takeads.com/knowledge-base/article/get-report-on-clicks
 */
class ActionResponse extends Response
{
    use HasMetaOffset;

    public function getData(): Generator
    {
        yield array_map(
            fn (array $item) => ActionDto::fromArray($item),
            json_decode($this->getResponse()->getBody(), true)['data']
        );
    }
}
