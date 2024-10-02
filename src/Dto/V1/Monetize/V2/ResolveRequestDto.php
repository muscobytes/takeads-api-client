<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2;

use Generator;
use Muscobytes\TakeAdsApi\Dto\RequestDto;
use Muscobytes\TakeAdsApi\Traits\Put;
use Psr\Http\Message\ResponseInterface;

/**
 * Get affiliate link
 * https://developers.takeads.com/knowledge-base/article/get-affiliate-link
 */
class ResolveRequestDto extends RequestDto
{
    use Put;

    /**
     * @param array $iris List of links that you want to affiliate (IRI, RFC 3987).
     * @param string $subId SubID parameter that you would like to add to the affiliate link.
     *      Only one SubID can be sent in each request.
     *      If you are sending several links in one request, the specified SubID will be added to each of them.
     *      SubID format:
     *       - does not exceed 6144 symbols
     *       - may include numbers 1 through 9, Latin letters, and the _ and - symbols.
     * @param bool $withImages If set to true, a link to the advertiser's logo will be included in the response.
     */
    public function __construct(
        public array   $iris,
        public string  $subId = '',
        public bool    $withImages = false
    )
    {
        //
    }


    public function getUrlPath(): string
    {
        return '/v1/product/monetize-api/v2/resolve';
    }


    public function makeResponseDto(ResponseInterface $response): Generator
    {
        return ResolveResponseDto::fromResponse($response);
    }


    public function toArray(): array
    {
        return [
            'iris'          => $this->iris,
            'subId'         => $this->subId,
            'withImages'    => $this->withImages
        ];
    }
}