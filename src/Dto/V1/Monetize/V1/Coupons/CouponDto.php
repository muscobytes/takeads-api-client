<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\Coupons;

use Muscobytes\TakeadsApi\Dto\Dto;
use Muscobytes\TakeadsApi\Traits\Casts\CastDatetime;
use DateTimeInterface;

/**
 * Coupon DTO
 * https://developers.takeads.com/knowledge-base/article/get-coupons
 */
final class CouponDto extends Dto
{
    use CastDatetime;

    /**
     * @param string $couponId Coupon unique identifier
     * @param bool $isActive Flag indicating if a coupon is active
     * @param string $trackingLink Affiliate link (RFC 3986)
     * @param string $name Coupon name
     * @param string|null $code Coupon code
     * @param int $merchantId Merchant unique identifier
     * @param string $imageUri URI to the coupon logo
     * @param array $languageCodes Array of languages supported by the website in ISO 639-1 alpha-2 format.
     *      If the value is empty, the coupon languages are unknown
     * @param DateTimeInterface $startDate Date from which the coupon can be applied
     * @param DateTimeInterface|null $endDate Date after which the coupon will no longer apply
     * @param string|null $description Detailed information about the coupon, including usage conditions and limitations
     * @param array $countryCodes List of country codes in ISO 3166-1 alpha-2 format where the coupon operates
     * @param array $categoryIds
     * @param DateTimeInterface $createdAt Date of the last update of the coupon in ISO 8601: 1988 (E) format
     * @param DateTimeInterface $updatedAt Date of the last update of the coupon in ISO 8601: 1988 (E) format
     */
    public function __construct(
        public string $couponId,
        public bool $isActive,
        public string $trackingLink,
        public string $name,
        public ?string $code,
        public int $merchantId,
        public string $imageUri,
        public array $languageCodes,
        public DateTimeInterface $startDate,
        public ?DateTimeInterface $endDate,
        public ?string $description,
        public array $countryCodes,
        public array $categoryIds,
        public DateTimeInterface $createdAt,
        public DateTimeInterface $updatedAt,
    )
    {
        //
    }


    public static function fromArray(array $array): self
    {
        return new self(
            couponId: $array['couponId'],
            isActive: $array['isActive'],
            trackingLink: $array['trackingLink'],
            name: $array['name'],
            code: $array['code'],
            merchantId: $array['merchantId'],
            imageUri: $array['imageUri'],
            languageCodes: $array['languageCodes'],
            startDate: self::castDatetime($array['startDate']),
            endDate: is_null($array['endDate']) ? null : self::castDatetime($array['endDate']),
            description: $array['description'],
            countryCodes: $array['countryCodes'],
            categoryIds: $array['categoryIds'],
            createdAt: self::castDatetime($array['createdAt']),
            updatedAt: self::castDatetime($array['updatedAt'])
        );
    }
}
