<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Api\Stats\Click;

use Generator;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Traits\HasMetaOffset;

/**
 * Get report on clicks
 * https://developers.takeads.com/knowledge-base/article/get-report-on-clicks
 */
final class ClickResponse extends Response
{
    use HasMetaOffset;

    public function getData(): Generator
    {
        foreach (json_decode($this->getResponse()->getBody(), true)['data'] as $item) {
            yield new ClickDto(...$item);
        }
    }
}