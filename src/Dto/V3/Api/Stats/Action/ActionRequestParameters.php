<?php

namespace Muscobytes\TakeAdsApi\Dto\V3\Api\Stats\Action;

use Muscobytes\TakeAdsApi\Dto\RequestParameters;
use Muscobytes\TakeAdsApi\Traits\Casts\CastDatetime;

/**
 * Get report on clicks
 * https://developers.takeads.com/knowledge-base/article/get-report-on-clicks
 */
readonly class ActionRequestParameters extends RequestParameters
{
    use CastDatetime;

    /**
     * @param string|null $dateFrom Starting point of the reporting period. This parameter can't be used without
     *      the ending point of the filtering period — dateTo. Example: 2021-08-03
     * @param string|null $dateTo Ending point of the reporting period. This parameter can't be used without
     *      the starting point of the filtering period — dateFrom. Example: 2021-08-04
     * @param string|null $date Exact reporting date. Example: 2021-08-03
     * @param int|null $days Number of days in the reporting period. Defaults to 7.
     *      Example: 3
     *      The starting date of the reporting period can be defined by the current date minus the number of days.
     * @param string|null $programId ID (UUIDv4) of the program you want to get the report for.
     *      Example: f527f086-3c67-4c03-8dd5-556d14106dd2
     * @param string|null $subId SubId of the deeplink you want to get the report for. Example: abc_123-2
     * @param string|null $adspaceId ID (UUIDv4) of the platform you want to get the report for.
     *      Example: 603f4ef6-ec4f-4f34-827c-9a66ca6920a4
     */
    public function __construct(
        public ?string $dateFrom,
        public ?string $dateTo,
        public ?string $date,
        public ?int $days,
        public ?string $programId,
        public ?string $subId,
        public ?string $adspaceId,
    )
    {
        //
    }
}
