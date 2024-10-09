<?php

namespace Muscobytes\TakeAdsApi\Dto\V3\Api\Stats\Action;

use Generator;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Traits\HasMetaNext;

/**
 * Get report on actions
 * https://developers.takeads.com/knowledge-base/article/get-report-on-actions
 */
class ActionResponse extends Response
{
    use HasMetaNext;

    public function getData(): Generator
    {
        yield array_map(
            fn (array $item) => ActionDto::fromArray($item),
            json_decode($this->getResponse()->getBody(), true)['data']
        );
    }
}
