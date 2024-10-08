<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Merchant;

/**
 * Get list of merchants
 * https://developers.takeads.com/knowledge-base/article/get-list-of-merchants
 */
final readonly class CommissionRate
{
    /**
     * @param float|null $fixedCommission Set amount paid per transaction or lead.
     * @param float|null $percentageCommission Percentage of the total sale amount paid per transaction.
     */
    public function __construct(
        public ?float $fixedCommission,
        public ?float $percentageCommission
    )
    {
        //
    }
}