<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V1\CouponSearch;

use Generator;
use Muscobytes\TakeAdsApi\Dto\Response;

/**
 * Search for coupons
 * https://developers.takeads.com/knowledge-base/article/search-for-coupons
 */
class CouponSearchResponse extends Response
{
    public function getData(): Generator
    {
        foreach (json_decode($this->response->getBody(), true)['data'] as $item) {
            $coupons = [];
            foreach ($item['coupons'] as $coupon) {
                $coupons[] = new CouponDto(...$coupon);
            }
            yield new CouponSearchDto(
                iri: $item['iris'],
                coupons: $coupons
            );
        }
    }
}