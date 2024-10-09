<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Api\Stats\Click;

use Muscobytes\TakeadsApi\Dto\Request;
use Muscobytes\TakeadsApi\Dto\Response;
use Muscobytes\TakeadsApi\Traits\Authorization\AccountKey;
use Muscobytes\TakeadsApi\Traits\Methods\Get;
use Psr\Http\Message\ResponseInterface;

/**
 * Get report on clicks
 * https://developers.takeads.com/knowledge-base/article/get-report-on-clicks
 */
class ClickRequest extends Request
{
    use Get;
    use AccountKey;

    protected string $path = 'v1/api/stats/click';


    public function makeResponse(ResponseInterface $response): Response
    {
        return new ClickResponse($response);
    }
}
