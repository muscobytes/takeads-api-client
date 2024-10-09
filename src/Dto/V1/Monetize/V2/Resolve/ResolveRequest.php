<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Resolve;

use Muscobytes\TakeadsApi\Dto\Request;
use Muscobytes\TakeadsApi\Dto\Response;
use Muscobytes\TakeadsApi\Traits\Authorization\PlatformKey;
use Muscobytes\TakeadsApi\Traits\Methods\Put;
use Psr\Http\Message\ResponseInterface as HttpResponseInterface;

/**
 * Get affiliate link
 * https://developers.takeads.com/knowledge-base/article/get-affiliate-link
 */
class ResolveRequest extends Request
{
    use Put;
    use PlatformKey;

    protected string $path = '/v1/product/monetize-api/v2/resolve';

    protected array $headers = [
        'Content-Type' => 'application/json'
    ];


    public function getBody(): string
    {
        return json_encode($this->parameters->toArray());
    }

    public function makeResponse(HttpResponseInterface $response): Response
    {
        return new ResolveResponse($response);
    }
}