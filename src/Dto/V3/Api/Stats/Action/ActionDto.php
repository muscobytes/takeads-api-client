<?php

namespace Muscobytes\TakeadsApi\Dto\V3\Api\Stats\Action;

use DateTimeInterface;
use Muscobytes\TakeadsApi\Dto\Dto;
use Muscobytes\TakeadsApi\Enums\PricingModelEnum;
use Muscobytes\TakeadsApi\Enums\StatusEnum;
use Muscobytes\TakeadsApi\Traits\Casts\CastDatetime;

/**
 * Get report on actions
 * https://developers.takeads.com/knowledge-base/article/get-report-on-actions
 */
final class ActionDto extends Dto
{
    use CastDatetime;

    /**
     * @param string $actionId Unique identifier of the action assigned by Takeads.
     * @param int $actionNumericId Numeric unique identifier of the action. This field must only be used to correlate
     *      actions from the new endpoint with actions from the old one actionId.
     * @param string $adspaceId Identifier of the adspace to which the action belongs.
     * @param int $merchantId Merchant identifier.
     * @param StatusEnum $status Action status.
     * @param string $subId Sub id associated with the action, as provided by the user.
     * @param int $publisherRevenue Amount of the publisher’s revenue.
     * @param int $orderAmount Order amount.
     * @param string $currencyCode ISO 4217:2008 alpha-3 currency code of the action's orderAmount and publisherRevenue.
     * @param PricingModelEnum $type Pricing model of the action.
     * @param string $orderDate Date when the action was received.
     * @param DateTimeInterface $createdAt Date when the action become available in API.
     * @param DateTimeInterface $updatedAt Date of the last update.
     * @param string $countryCode Alpha-2 country code according to the ISO 3166 standard.
     * @param string $clickId Click unique identifier. Alphanumeric.
     * @param string $couponId Coupon unique identifier. Alphanumeric.
     */
    public function __construct(
        public string $actionId,
        public int $actionNumericId,
        public string $adspaceId,
        public int $merchantId,
        public StatusEnum $status,
        public string $subId,
        public int $publisherRevenue,
        public int $orderAmount,
        public string $currencyCode,
        public PricingModelEnum $type,
        public string $orderDate,
        public DateTimeInterface $createdAt,
        public DateTimeInterface $updatedAt,
        public string $countryCode,
        public string $clickId,
        public string $couponId
    )
    {
        //
    }


    public static function fromArray(array $array): self
    {
        return new self(
            actionId: $array['actionId'],
            actionNumericId: $array['actionNumericId'],
            adspaceId: $array['adspaceId'],
            merchantId: $array['merchantId'],
            status: $array['status'],
            subId: $array['subId'],
            publisherRevenue: $array['publisherRevenue'],
            orderAmount: $array['orderAmount'],
            currencyCode: $array['currencyCode'],
            type: $array['type'],
            orderDate: $array['orderDate'],
            createdAt: self::castDatetime($array['createdAt']),
            updatedAt: self::castDatetime($array['updatedAt']),
            countryCode: $array['countryCode'],
            clickId: $array['clickId'],
            couponId: $array['couponId']
        );
    }
}
