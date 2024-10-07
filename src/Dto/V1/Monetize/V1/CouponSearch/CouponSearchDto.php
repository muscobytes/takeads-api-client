<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V1\CouponSearch;

/**
 * Search for coupons
 * https://developers.takeads.com/knowledge-base/article/search-for-coupons
 */
readonly class CouponSearchDto
{
    /**
     * @param string $iri Link sent in the request.
     * @param array $coupons The result of affiliation of the link you requested for monetization.
     */
    public function __construct(
        public string $iri,
        public array $coupons
    )
    {
        //
    }
}