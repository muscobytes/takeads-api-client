<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V1\Coupons;

use Muscobytes\TakeAdsApi\Dto\Request;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Traits\Methods\Get;
use Psr\Http\Message\ResponseInterface;

/**
 * Get coupons
 * https://developers.takeads.com/knowledge-base/article/get-coupons
 */
class CouponsRequest extends Request
{
    use Get;

    protected string $path = '/v1/product/monetize-api/v1/coupon';



    public function makeResponse(ResponseInterface $response): Response
    {
        return new CouponsResponse($response);
    }
}