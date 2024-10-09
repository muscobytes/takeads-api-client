<?php

namespace Muscobytes\TakeAdsApi\Dto\V3\Api\Stats\Action;

use Muscobytes\TakeAdsApi\Dto\Request;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Traits\Methods\Get;
use Psr\Http\Message\ResponseInterface;

/**
 * Get report on clicks
 * https://developers.takeads.com/knowledge-base/article/get-report-on-clicks
 */
class ActionRequest extends Request
{
    use Get;

    private string $path = 'v3/api/stats/action';

    public function makeResponse(ResponseInterface $response): Response
    {
        return new ActionResponse($response);
    }
}
