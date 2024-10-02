<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V1;

use Generator;
use Muscobytes\TakeAdsApi\Dto\RequestDto;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Traits\Get;
use Psr\Http\Message\ResponseInterface;

/**
 * Get coupons
 * https://developers.takeads.com/knowledge-base/article/get-coupons
 */
class CouponRequestDto extends RequestDto
{
    use Get;



    public function getUrlPath(): string
    {
        return '/v1/product/monetize-api/v1/coupon';
    }


    public function makeResponseDto(ResponseInterface $response): Response|Generator
    {
        // TODO: Implement makeResponseDto() method.
    }


    public function toArray(): array
    {
        return [
            'isActive' => $this->isActive,
            'updatedAtFrom' => $this->updatedAtFrom,
            'updatedAtTo' => $this->updatedAtTo,
            'startDateBefore' => $this->startDateBefore,
            'endDateAfter' => $this->endDateAfter,
            'languageCodes' => $this->languageCodes,
            'categoryIds' => $this->categoryIds,
            'countryCodes' => $this->countryCodes,
            'next' => $this->next,
            'limit' => $this->limit,
        ];
    }
}