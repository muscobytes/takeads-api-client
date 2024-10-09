<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\CouponSearch;

use Muscobytes\TakeadsApi\Dto\Request;
use Muscobytes\TakeadsApi\Dto\Response;
use Muscobytes\TakeadsApi\Traits\Methods\Post;
use Psr\Http\Message\ResponseInterface;

/**
 * Search for coupons
 * https://developers.takeads.com/knowledge-base/article/search-for-coupons
 */
class CouponSearchRequest extends Request
{
    use Post;

    protected string $path = '/v1/product/monetize-api/v1/coupon/search';

    public function makeResponse(ResponseInterface $response): Response
    {
        return new CouponSearchResponse($response);
    }
}