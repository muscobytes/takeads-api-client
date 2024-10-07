<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Merchant;

/**
 * Get list of merchants
 * https://developers.takeads.com/knowledge-base/article/get-list-of-merchants
 */
final readonly class CommissionRate
{
    /**
     * @param int|null $fixedCommission Set amount paid per transaction or lead.
     * @param int|null $percentageCommission Percentage of the total sale amount paid per transaction.
     */
    public function __construct(
        public ?int $fixedCommission,
        public ?int $percentageCommission
    )
    {
        //
    }
}