<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Merchant;

use Muscobytes\TakeAdsApi\Dto\Request;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Traits\Methods\Get;
use Psr\Http\Message\ResponseInterface;

/**
 * Get list of merchants
 * https://developers.takeads.com/knowledge-base/article/get-list-of-merchants
 */
class MerchantRequest extends Request
{
    use Get;

    protected string $path = '/v1/product/monetize-api/v2/merchant';

    public function makeResponse(ResponseInterface $response): Response
    {
        return new MerchantResponse($response);
    }
}