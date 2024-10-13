<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\CouponSearch;

use Muscobytes\TakeadsApi\Dto\Request;
use Muscobytes\TakeadsApi\Dto\Response;
use Muscobytes\TakeadsApi\Interfaces\RequestParametersInterface;
use Muscobytes\TakeadsApi\Traits\Authorization\PlatformKey;
use Muscobytes\TakeadsApi\Traits\Methods\Post;
use Psr\Http\Message\ResponseInterface;

/**
 * Search for coupons
 * https://developers.takeads.com/knowledge-base/article/search-for-coupons
 */
class CouponSearchRequest extends Request
{
    use Post;
    use PlatformKey;

    protected string $path = '/v1/product/monetize-api/v1/coupon/search';


    public function __construct(string $bearerToken, RequestParametersInterface $parameters)
    {
        $this->setHeader('Content-Type', 'application/json');
        parent::__construct($bearerToken, $parameters);
    }


    public function getBody(): string
    {
        return json_encode($this->parameters->toArray());
    }


    public function makeResponse(ResponseInterface $response): Response
    {
        return new CouponSearchResponse($response);
    }
}
