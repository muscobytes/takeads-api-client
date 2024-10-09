<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V1\Coupons;

use Generator;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Traits\HasMetaNext;

/**
 * Get coupons
 * https://developers.takeads.com/knowledge-base/article/get-coupons
 */
final class CouponsResponse extends Response
{
    use HasMetaNext;

    public function getData(): Generator
    {
        yield array_map(
            fn (array $item) => CouponDto::fromArray($item),
            json_decode($this->response->getBody(), true)['data']
        );
    }
}