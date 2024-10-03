<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2;

use Generator;
use Muscobytes\TakeAdsApi\Dto\Request;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Traits\Put;
use Psr\Http\Message\ResponseInterface as HttpResponseInterface;

/**
 * Get affiliate link
 * https://developers.takeads.com/knowledge-base/article/get-affiliate-link
 */
class ResolveRequest extends Request
{
    use Put;

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