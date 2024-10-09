<?php

namespace Muscobytes\TakeadsApi\Dto\V3\Api\Stats\Action;

use Muscobytes\TakeadsApi\Dto\Request;
use Muscobytes\TakeadsApi\Dto\Response;
use Muscobytes\TakeadsApi\Traits\Authorization\AccountKey;
use Muscobytes\TakeadsApi\Traits\Methods\Get;
use Psr\Http\Message\ResponseInterface;

/**
 * Get report on actions
 * https://developers.takeads.com/knowledge-base/article/get-report-on-actions
 */
class ActionRequest extends Request
{
    use Get;
    use AccountKey;


    private string $path = 'v3/api/stats/action';

    public function makeResponse(ResponseInterface $response): Response
    {
        return new ActionResponse($response);
    }
}
