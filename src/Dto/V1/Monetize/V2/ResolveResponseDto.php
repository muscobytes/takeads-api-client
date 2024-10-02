<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2;

use Generator;
use Muscobytes\TakeAdsApi\Dto\ResponseDto;
use Psr\Http\Message\ResponseInterface;

/**
 * Get affiliate link
 * https://developers.takeads.com/knowledge-base/article/get-affiliate-link
 */
class ResolveResponseDto extends ResponseDto
{
    /**
     * @param string $iri Link sent in the request.
     * @param string $trackingLink Affiliate link to the advertiser's website (RFC 3986).
     *      You can update the s (SubID) and url (Deeplink) parameters after the tracking link is generated.
     * @param string|null $imageUrl Link to the advertiser's logo, if requested (RFC 3986).
     */
    public function __construct(
        public readonly string $iri,
        public readonly string $trackingLink,
        public readonly ?string $imageUrl = null
    )
    {
        //
    }

    public static function fromResponse(ResponseInterface $response): Generator
    {
        foreach(json_decode($response->getBody()) as $item) {
            yield new ResolveResponseDto(...$item);
        }
    }
}