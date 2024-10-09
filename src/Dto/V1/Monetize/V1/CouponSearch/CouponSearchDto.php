<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\CouponSearch;

/**
 * Search for coupons
 * https://developers.takeads.com/knowledge-base/article/search-for-coupons
 */
final readonly class CouponSearchDto
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


    public static function fromArray(array $array): self
    {
        return new self(
            iri: $array['iris'],
            coupons: array_map(
                fn (array $coupon) => CouponDto::fromArray($coupon),
                $array['coupons']
            )
        );
    }
}