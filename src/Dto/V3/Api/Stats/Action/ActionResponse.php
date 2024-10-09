<?php

namespace Muscobytes\TakeadsApi\Dto\V3\Api\Stats\Action;

use Generator;
use Muscobytes\TakeadsApi\Dto\Response;
use Muscobytes\TakeadsApi\Traits\HasMetaNext;

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
