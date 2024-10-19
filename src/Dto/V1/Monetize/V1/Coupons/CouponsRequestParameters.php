<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\Coupons;

use DateTimeInterface;
use Muscobytes\TakeadsApi\Dto\RequestParameters;
use Muscobytes\TakeadsApi\Traits\Casts\CastDatetime;

/**
 * Get coupons
 * https://developers.takeads.com/knowledge-base/article/get-coupons
 */
final class CouponsRequestParameters extends RequestParameters
{
    use CastDatetime;

    /**
     * @param bool|null $isActive Flag indicating if a coupon is active.
     * @param DateTimeInterface|null $updatedAtFrom Minimum date of the last update of the coupon in ISO 8601: 1988 (E) format.
     * @param DateTimeInterface|null $updatedAtTo Maximum date of the last update of the coupon in ISO 8601: 1988 (E) format.
     * @param DateTimeInterface|null $startDateBefore Date until which the coupon became active in ISO 8601: 1988 (E) format.
     * @param DateTimeInterface|null $endDateAfter Date after which the coupon will become inactive in ISO 8601: 1988 (E) format.
     * @param array|null $languageCodes ISO 639-1 alpha-2 language code supported by the coupon merchant.
     * @param array|null $categoryIds Coupon category identifiers.
     * @param array|null $countryCodes ISO 639-1 alpha-2 language codes.
     * @param string|null $next Identifier of the next page to retrieve.
     * @param int|null $limit Maximum number of entries to return. The default value is 100.
     */
    public function __construct(
        public ?bool              $isActive = null,
        public ?DateTimeInterface $updatedAtFrom = null,
        public ?DateTimeInterface $updatedAtTo = null,
        public ?DateTimeInterface $startDateBefore = null,
        public ?DateTimeInterface $endDateAfter = null,
        public ?array             $languageCodes = null,
        public ?array             $categoryIds = null,
        public ?array             $countryCodes = null,
        public ?string            $next = null,
        public ?int               $limit = null
    )
    {
        //
    }


    public static function fromArray(array $parameters): self
    {
        return new self(
            isActive: $parameters['isActive'] ?? null,
            updatedAtFrom: isset($parameters['updatedAtFrom'])
                ? self::castDate($parameters['updatedAtFrom'])
                : null,
            updatedAtTo: isset($parameters['updatedAtTo'])
                ? self::castDate($parameters['updatedAtTo'])
                : null,
            startDateBefore: isset($parameters['startDateBefore'])
                ? self::castDate($parameters['startDateBefore'])
                : null,
            endDateAfter: isset($parameters['endDateAfter'])
                ? self::castDate($parameters['endDateAfter'])
                : null,
            languageCodes: $parameters['languageCodes'] ?? null,
            categoryIds: $parameters['categoryIds'] ?? null,
            countryCodes: $parameters['countryCodes'] ?? null,
            next: $parameters['next'] ?? null,
            limit: $parameters['limit'] ?? null
        );
    }
}
