<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V1;

use Generator;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Traits\HasMeta;

/**
 * Get coupons
 * https://developers.takeads.com/knowledge-base/article/get-coupons
 */
final class CouponsResponse extends Response
{
    use HasMeta;

    public function getData(): Generator
    {
        foreach (json_decode($this->response->getBody(), true)['data'] as $item) {
            yield new CouponDto(...$item);
        }
    }
}