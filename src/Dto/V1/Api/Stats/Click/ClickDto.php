<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Api\Stats\Click;

use DateTimeInterface;
use Muscobytes\TakeadsApi\Dto\Dto;
use Muscobytes\TakeadsApi\Enums\ProductIdEnum;
use Muscobytes\TakeadsApi\Traits\Casts\CastDatetime;

/**
 * Get report on clicks
 * https://developers.takeads.com/knowledge-base/article/get-report-on-clicks
 */
final class ClickDto extends Dto
{
    use CastDatetime;

    /**
     * @param string $id Click item ID.
     * @param string $adspaceId ID (UUIDv4) of the platform you received the report for.
     * @param string $adspaceName Name of the platform.
     * @param string|null $programId ID (UUIDv4) of the program you received the report for.
     * @param string $programName Name of the program.
     * @param string|null $subId SubID of the deeplink you received the report for.
     * @param string $date Date when clicks in the click item were performed. Example: 2021-08-03
     * @param int $count Number of clicks in the click item.
     * @param ProductIdEnum $productId ID of the Takeads product.
     * @param DateTimeInterface $updatedAt Timestamp ($ISO 8601) when information about clicks in the click item was
     *      last updated in the statistics. Example: 2021-08-03T19:53:15.816Z
     */
    public function __construct(
        public string $id,
        public string $adspaceId,
        public string $adspaceName,
        public ?string $programId,
        public string $programName,
        public ?string $subId,
        public string $date,
        public int $count,
        public ProductIdEnum $productId,
        public DateTimeInterface $updatedAt
    )
    {
        //
    }


    public static function fromArray(array $array): self
    {
        return new self(
            id: $array['id'],
            adspaceId: $array['adspaceId'],
            adspaceName: $array['adspaceName'],
            programId: $array['programId'],
            programName: $array['programName'],
            subId: $array['subId'],
            date: $array['date'],
            count: $array['count'],
            productId: ProductIdEnum::from($array['productId']),
            updatedAt: self::castDatetime($array['updatedAt'])
        );
    }
}