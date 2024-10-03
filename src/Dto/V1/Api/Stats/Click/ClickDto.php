<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Api\Stats\Click;

/**
 * Get report on clicks
 * https://developers.takeads.com/knowledge-base/article/get-report-on-clicks
 */
readonly class ClickDto
{
    /**
     * @param int $id Click item ID.
     * @param string $adspaceId ID (UUIDv4) of the platform you received the report for.
     * @param string $adspaceName Name of the platform.
     * @param string $programId ID (UUIDv4) of the program you received the report for.
     * @param string $programName Name of the program.
     * @param string $subId SubID of the deeplink you received the report for.
     * @param string $date Date when clicks in the click item were performed. Example: 2021-08-03
     * @param int $count Number of clicks in the click item.
     * @param string $productId ID of the Takeads product. Possible values:
     *      - MONETIZE_LINK_SCRIPT,
     *      - MONETIZE_LINK_API,
     *      - MONETIZE_API,
     *      - MONETIZE_SEARCH_API,
     *      - MONETIZE_SUGGEST.
     * @param string $updatedAt Timestamp ($ISO 8601) when information about clicks in the click item was
     *      last updated in the statistics. Example: 2021-08-03T19:53:15.816Z
     */
    public function __construct(
        public int $id,
        public string $adspaceId,
        public string $adspaceName,
        public string $programId,
        public string $programName,
        public string $subId,
        public string $date,
        public int $count,
        public string $productId,
        public string $updatedAt
    )
    {
        //
    }
}