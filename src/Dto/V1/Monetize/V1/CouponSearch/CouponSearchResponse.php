<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\CouponSearch;

use Generator;
use Muscobytes\TakeadsApi\Dto\Response;

/**
 * Search for coupons
 * https://developers.takeads.com/knowledge-base/article/search-for-coupons
 */
class CouponSearchResponse extends Response
{
    public function getData(): Generator
    {
        yield array_map(
            fn (array $item) => CouponSearchDto::fromArray($item),
            json_decode($this->response->getBody(), true)['data']
        );
    }
}
