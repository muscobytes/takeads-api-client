<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Merchant;

use Muscobytes\TakeadsApi\Dto\Dto;

/**
 * Get list of merchants
 * https://developers.takeads.com/knowledge-base/article/get-list-of-merchants
 */
final class CommissionRate extends Dto
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


    public static function fromArray(array $array): self
    {
        return new self(...$array);
    }
}