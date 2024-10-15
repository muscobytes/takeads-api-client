<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\Coupons;

use Muscobytes\TakeadsApi\Dto\RequestParameters;

/**
 * Get coupons
 * https://developers.takeads.com/knowledge-base/article/get-coupons
 */
final class CouponsRequestParameters extends RequestParameters
{
    public function __construct(
        public ?string $isActive = null,
        public ?string $updatedAtFrom = null,
        public ?string $updatedAtTo = null,
        public ?string $startDateBefore = null,
        public ?string $endDateAfter = null,
        public ?array $languageCodes = null,
        public ?array $categoryIds = null,
        public ?array $countryCodes = null,
        public ?string $next = null,
        public ?int $limit = null
    )
    {
        //
    }
}