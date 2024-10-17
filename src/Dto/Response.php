<?php

namespace Muscobytes\TakeadsApi\Dto;


use Muscobytes\TakeadsApi\Dto\V1\Api\Stats\Click\ClickDto;
use Muscobytes\TakeadsApi\Dto\V1\Api\Stats\Click\ClickResponse;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\Coupons\CouponDto;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\Coupons\CouponsResponse;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\CouponSearch\CouponSearchDto;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\CouponSearch\CouponSearchResponse;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Merchant\MerchantDto;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Merchant\MerchantResponse;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Resolve\AffiliateLinkDto;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Resolve\ResolveResponse;
use Muscobytes\TakeadsApi\Dto\V3\Api\Stats\Action\ActionDto;
use Muscobytes\TakeadsApi\Dto\V3\Api\Stats\Action\ActionResponse;
use Muscobytes\TakeadsApi\Interfaces\ResponseInterface;
use Psr\Http\Message\ResponseInterface as HttpResponseInterface;

abstract class Response implements ResponseInterface
{
    public function __construct(
        protected HttpResponseInterface $response
    )
    {
        //
    }

    public function getResponse(): HttpResponseInterface
    {
        return $this->response;
    }


    protected function getDtoClass(ResponseInterface $response): string
    {
        return match (get_class($this)) {
            ClickResponse::class => ClickDto::class,
            CouponsResponse::class => CouponDto::class,
            CouponSearchResponse::class => CouponSearchDto::class,
            MerchantResponse::class => MerchantDto::class,
            ResolveResponse::class => AffiliateLinkDto::class,
            ActionResponse::class => ActionDto::class,
        };
    }


    public function getPayload(): array
    {
        /** @var Dto $dtoClassName */
        $dtoClassName = $this->getDtoClass($this);
        return array_map(
            fn (array $item) => $dtoClassName::fromArray($item),
            json_decode($this->getResponse()->getBody(), true)['data']
        );
    }
}