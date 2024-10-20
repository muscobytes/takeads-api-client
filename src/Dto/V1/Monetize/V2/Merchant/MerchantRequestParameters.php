<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Merchant;

use DateTimeInterface;
use Muscobytes\TakeadsApi\Dto\RequestParameters;
use Muscobytes\TakeadsApi\Traits\Casts\CastDatetime;

/**
 * Get list of merchants
 * https://developers.takeads.com/knowledge-base/article/get-list-of-merchants
 */
final class MerchantRequestParameters extends RequestParameters
{
    use CastDatetime;

    /**
     * @param string|null $next Pointer (integer) to the next page of the merchant list. If specified, a list
     *      of merchants from the indicated page is retrieved.
     * @param int|null $limit Maximum number of merchants that may be returned for a single request.
     *      The maximum value is 500. The default value is 100.
     * @param DateTimeInterface|null $updatedAtFrom Lower border of the updatedAt field to filter (included). It specifies
     *      the starting point of the period during which information about merchants was last updated. Date and time
     *      in the ISO 8601 format.
     *      Example: Example: 2021-08-03T19:53:15.816Z
     * @param bool|null $isActive Status of the merchant. A merchant is active if it has at least one active program.
     */
    public function __construct(
        public ?string            $next = null,
        public ?int               $limit = null,
        public ?DateTimeInterface $updatedAtFrom = null,
        public ?bool              $isActive = null
    )
    {
        //
    }


    public static function fromArray(array $parameters): self
    {
        return new self(
            next: $parameters['next'] ?? null,
            limit: $parameters['limit'] ?? null,
            updatedAtFrom: isset($parameters['updatedAtFrom'])
                ? self::castDatetime($parameters['updatedAtFrom'])
                : null,
            isActive: $parameters['isActive'] ?? null
        );
    }
}
