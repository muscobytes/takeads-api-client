<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\CouponSearch;

use Muscobytes\TakeadsApi\Dto\RequestParameters;
use Muscobytes\TakeadsApi\Traits\Casts\CastDatetime;

/**
 * Search for coupons
 * https://developers.takeads.com/knowledge-base/article/search-for-coupons
 */
final class CouponSearchRequestParameters extends RequestParameters
{
    /**
     * @param array $iris List of links to the advertiser or product that you search a coupon for.
     * @param array|null $languageCodes ISO 639-1 alpha-2 language code supported by the coupon merchant.
     * @param array|null $categoryIds Coupon category identifiers.
     * @param string|null $subId SubID parameter that you want to add to the affiliate link.
     *       - Only one SubID can be sent with each request.
     *       - If you send more than one link in the request, the specified SubID will be added to each link.
     *       - SubID parameter:
     *          - does not exceed 6144 symbols
     *          - can include numbers from 1 to 9, Latin letters, and the _ and - symbols.
     */
    public function __construct(
        public array $iris,
        public ?array $languageCodes = null,
        public ?array $categoryIds = null,
        public ?string $subId = null
    )
    {
        //
    }


    public static function fromArray(array $parameters): self
    {
        return new self(
            iris: $parameters['iris'] ?? null,
            languageCodes: $parameters['languageCodes'] ?? null,
            categoryIds: $parameters['categoryIds'] ?? null,
            subId: $parameters['subId'] ?? null
        );
    }
}
