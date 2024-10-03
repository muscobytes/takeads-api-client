<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V1\CouponSearch;

readonly class CouponDto
{
    /**
     * @param string $id Coupon unique identifier.
     * @param string $trackingLink Affiliate link (RFC 3986).
     * @param string $name Coupon name.
     * @param string $code Coupon code.
     * @param int $merchantId Merchant unique identifier.
     * @param string $imageUri URI to the coupon logo.
     * @param array $languageCodes Array of languages supported by the website in ISO 639-1 alpha-2 format.
     *      If the value is empty, the coupon languages are unknown.
     * @param array $countryCodes Date from which the coupon can be applied.
     * @param string $startDate Date after which the coupon will no longer apply.
     * @param string $endDate Detailed information about the coupon, including usage conditions and limitations.
     * @param string $description List of the country codes in ISO 3166-1 alpha-2 format where the coupon operates.
     * @param array $categoryIds List of merchant category identifiers.
     * @param string $createdAt Date of the last update of the coupon in ISO 8601: 1988 (E) format.
     * @param string $updatedAt Date of the last update of the coupon in ISO 8601: 1988 (E) format.
     */
    public function __construct(
        public string $id,
        public string $trackingLink,
        public string $name,
        public string $code,
        public int $merchantId,
        public string $imageUri,
        public array $languageCodes,
        public array $countryCodes,
        public string $startDate,
        public string $endDate,
        public string $description,
        public array $categoryIds,
        public string $createdAt,
        public string $updatedAt
    )
    {
        //
    }
}