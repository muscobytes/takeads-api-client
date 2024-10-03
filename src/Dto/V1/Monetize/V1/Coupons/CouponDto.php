<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V1\Coupons;

/**
 * Coupon DTO
 * https://developers.takeads.com/knowledge-base/article/get-coupons
 */
class CouponDto
{
    /**
     * @param string $couponId Coupon unique identifier
     * @param bool $isActive Flag indicating if a coupon is active
     * @param string $trackingLink Affiliate link (RFC 3986)
     * @param string $name Coupon name
     * @param string|null $code Coupon code
     * @param string $merchantId Merchant unique identifier
     * @param string $imageUri URI to the coupon logo
     * @param array $languageCodes Array of languages supported by the website in ISO 639-1 alpha-2 format.
     *      If the value is empty, the coupon languages are unknown
     * @param string $startDate Date from which the coupon can be applied
     * @param string|null $endDate Date after which the coupon will no longer apply
     * @param string|null $description Detailed information about the coupon, including usage conditions and limitations
     * @param array $countryCodes List of country codes in ISO 3166-1 alpha-2 format where the coupon operates
     * @param array $categoryIds
     * @param string $createdAt Date of the last update of the coupon in ISO 8601: 1988 (E) format
     * @param string $updatedAt Date of the last update of the coupon in ISO 8601: 1988 (E) format
     */
    public function __construct(
        public string $couponId,
        public bool $isActive,
        public string $trackingLink,
        public string $name,
        public ?string $code,
        public string $merchantId,
        public string $imageUri,
        public array $languageCodes,
        public string $startDate,
        public ?string $endDate,
        public ?string $description,
        public array $countryCodes,
        public array $categoryIds,
        public string $createdAt,
        public string $updatedAt,
    )
    {
        //
    }
}