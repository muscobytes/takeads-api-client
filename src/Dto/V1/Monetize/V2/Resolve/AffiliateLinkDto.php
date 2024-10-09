<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Resolve;

final readonly class AffiliateLinkDto
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


    public static function fromArray(array $array): self
    {
        return new self(...$array);
    }
}