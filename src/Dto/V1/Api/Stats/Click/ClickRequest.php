<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Api\Stats\Click;

use Muscobytes\TakeAdsApi\Dto\Request;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Traits\Get;
use Psr\Http\Message\ResponseInterface;

/**
 * Get report on clicks
 * https://developers.takeads.com/knowledge-base/article/get-report-on-clicks
 */
class ClickRequest extends Request
{
    use Get;

    protected string $path = '/api/stats/click';


    public function makeResponse(ResponseInterface $response): Response
    {
        return new ClickResponse($response);
    }
}