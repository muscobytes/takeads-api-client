<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Merchant;

use Muscobytes\TakeAdsApi\Dto\RequestParameters;

/**
 * Get list of merchants
 * https://developers.takeads.com/knowledge-base/article/get-list-of-merchants
 */
final readonly class MerchantRequestParameters extends RequestParameters
{
    public function __construct(
        public ?string $next = null,
        public ?int $limit = null,
        public ?string $updatedAtFrom = null,
        public ?bool $isActive = null
    )
    {
        //
    }
}