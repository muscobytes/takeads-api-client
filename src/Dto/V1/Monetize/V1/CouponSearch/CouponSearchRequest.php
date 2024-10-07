<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V1\CouponSearch;

use Muscobytes\TakeAdsApi\Dto\Request;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Traits\Methods\Post;
use Psr\Http\Message\ResponseInterface;

/**
 * Search for coupons
 * https://developers.takeads.com/knowledge-base/article/search-for-coupons
 */
class CouponSearchRequest extends Request
{
    use Post;

    public function makeResponse(ResponseInterface $response): Response
    {
        return new CouponSearchResponse($response);
    }
}