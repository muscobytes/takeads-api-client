<?php

namespace Muscobytes\TakeadsApi\Dto\V3\Api\Stats\Action;

use Muscobytes\TakeadsApi\Dto\RequestParameters;
use Muscobytes\TakeadsApi\Enums\StatusEnum;

/**
 * Get report on actions
 * https://developers.takeads.com/knowledge-base/article/get-report-on-actions
 */
readonly class ActionRequestParameters extends RequestParameters
{
    /**
     * @param string|null $updatedAtFrom Earliest date of the last update of actions.
     *      Example: 2024-01-30T08:07:12.166Z
     * @param string|null $updatedAtTo Oldest date of the last update of actions.
     *      Example: 2024-01-30T08:07:12.166Z
     * @param string|null $createdAtFrom Earliest date of the action creation.
     *      Example: 2024-01-30T08:07:12.166Z
     * @param string|null $createdAtTo Oldest date of the action creation.
     *      Example: 2024-01-30T08:07:12.166Z
     * @param StatusEnum|null $status
     * @param string|null $subId
     * @param string|null $adspaceId
     * @param string|null $merchantId
     */
    public function __construct(
        public ?string $updatedAtFrom,
        public ?string $updatedAtTo,
        public ?string $createdAtFrom,
        public ?string $createdAtTo,
        public ?StatusEnum $status,
        public ?string $subId,
        public ?string $adspaceId,
        public ?string $merchantId,
    )
    {
        //
    }
}
