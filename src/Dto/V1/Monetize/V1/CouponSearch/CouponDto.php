<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\CouponSearch;

use DateTimeInterface;
use Muscobytes\TakeadsApi\Traits\Casts\CastDatetime;

/**
 * Search for coupons
 * https://developers.takeads.com/knowledge-base/article/search-for-coupons
 */
final readonly class CouponDto
{
    use CastDatetime;

    /**
     * @param string $couponId
     * @param string $trackingLink Affiliate link (RFC 3986).
     * @param string $name Coupon name.
     * @param string|null $code Coupon code.
     * @param int $merchantId Merchant unique identifier.
     * @param string $imageUri URI to the coupon logo.
     * @param array $languageCodes Array of languages supported by the website in ISO 639-1 alpha-2 format.
     *      If the value is empty, the coupon languages are unknown.
     * @param array $countryCodes Date from which the coupon can be applied.
     * @param DateTimeInterface $startDate Date after which the coupon will no longer apply.
     * @param DateTimeInterface $endDate Detailed information about the coupon, including usage conditions and limitations.
     * @param string $description List of the country codes in ISO 3166-1 alpha-2 format where the coupon operates.
     * @param array $categoryIds List of merchant category identifiers.
     * @param DateTimeInterface $createdAt Date of the last update of the coupon in ISO 8601: 1988 (E) format.
     * @param DateTimeInterface $updatedAt Date of the last update of the coupon in ISO 8601: 1988 (E) format.
     */
    public function __construct(
        public string $couponId,
        public string $trackingLink,
        public string $name,
        public ?string $code,
        public int $merchantId,
        public string $imageUri,
        public array $languageCodes,
        public array $countryCodes,
        public DateTimeInterface $startDate,
        public DateTimeInterface $endDate,
        public string $description,
        public array $categoryIds,
        public DateTimeInterface $createdAt,
        public DateTimeInterface $updatedAt
    )
    {
        //
    }


    public static function fromArray(array $array): self
    {
        return new self(
            couponId: $array['couponId'],
            trackingLink: $array['trackingLink'],
            name: $array['name'],
            code: $array['code'],
            merchantId: $array['merchantId'],
            imageUri: $array['imageUri'],
            languageCodes: $array['languageCodes'],
            countryCodes: $array['countryCodes'],
            startDate: self::castDatetime($array['startDate']),
            endDate: self::castDatetime($array['endDate']),
            description: $array['description'],
            categoryIds: $array['categoryIds'],
            createdAt: self::castDatetime($array['createdAt']),
            updatedAt: self::castDatetime($array['updatedAt'])
        );
    }
}