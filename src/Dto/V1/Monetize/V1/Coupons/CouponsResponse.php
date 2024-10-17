<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\Coupons;

use Generator;
use Muscobytes\TakeadsApi\Dto\Response;
use Muscobytes\TakeadsApi\Traits\HasMetaNext;

/**
 * Get coupons
 * https://developers.takeads.com/knowledge-base/article/get-coupons
 */
final class CouponsResponse extends Response
{
    use HasMetaNext;

    public function getPayload(): array
    {
        return array_map(
            fn (array $item) => CouponDto::fromArray($item),
            $this->getData()
        );
    }
}