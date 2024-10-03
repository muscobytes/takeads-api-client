<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Resolve;

readonly class AffiliateLinkDto
{
    /**
     * @param string $iri Link sent in the request.
     * @param string $trackingLink Affiliate link to the advertiser's website (RFC 3986).
     *      You can update the s (SubID) and url (Deeplink) parameters after the tracking link is generated.
     * @param string|null $imageUrl Link to the advertiser's logo, if requested (RFC 3986).
     */
    public function __construct(
        public string $iri,
        public string $trackingLink,
        public ?string $imageUrl = null
    )
    {
        //
    }
}