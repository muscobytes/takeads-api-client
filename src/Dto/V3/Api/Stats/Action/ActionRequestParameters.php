<?php

namespace Muscobytes\TakeadsApi\Dto\V3\Api\Stats\Action;

use DateTimeInterface;
use Muscobytes\TakeadsApi\Dto\RequestParameters;
use Muscobytes\TakeadsApi\Enums\StatusEnum;
use Muscobytes\TakeadsApi\Traits\Casts\CastDatetime;

/**
 * Get report on actions
 * https://developers.takeads.com/knowledge-base/article/get-report-on-actions
 */
final class ActionRequestParameters extends RequestParameters
{
    use CastDatetime;

    /**
     * @param DateTimeInterface|null $updatedAtFrom Earliest date of the last update of actions.
     *      Example: 2024-01-30T08:07:12.166Z
     * @param DateTimeInterface|null $updatedAtTo Oldest date of the last update of actions.
     *      Example: 2024-01-30T08:07:12.166Z
     * @param DateTimeInterface|null $createdAtFrom Earliest date of the action creation.
     *      Example: 2024-01-30T08:07:12.166Z
     * @param DateTimeInterface|null $createdAtTo Oldest date of the action creation.
     *      Example: 2024-01-30T08:07:12.166Z
     * @param StatusEnum|null $status
     * @param string|null $subId
     * @param string|null $adspaceId
     * @param string|null $merchantId
     */
    public function __construct(
        public ?DateTimeInterface $updatedAtFrom,
        public ?DateTimeInterface $updatedAtTo,
        public ?DateTimeInterface $createdAtFrom,
        public ?DateTimeInterface $createdAtTo,
        public ?StatusEnum        $status,
        public ?string            $subId,
        public ?string            $adspaceId,
        public ?string            $merchantId,
    )
    {
        //
    }


    public static function fromArray(array $array): self
    {
        return new self(
            updatedAtFrom: isset($array['updatedAtFrom'])
                ? self::castDatetime($array['updatedAtFrom'])
                : null,
            updatedAtTo: isset($array['updatedAtTo'])
                ? self::castDatetime($array['updatedAtTo'])
                : null,
            createdAtFrom: isset($array['createdAtFrom'])
                ? self::castDatetime($array['createdAtFrom'])
                : null,
            createdAtTo: isset($array['createdAtTo'])
                ? self::castDatetime($array['createdAtTo'])
                : null,
            status: isset($array['status'])
                ? StatusEnum::from($array['status'])
                : null,
            subId: $array['subId'] ?? null,
            adspaceId: $array['adspaceId'] ?? null,
            merchantId: $array['merchantId'] ?? null,
        );
    }
}
