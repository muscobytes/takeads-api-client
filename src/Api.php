<?php

namespace Muscobytes\TakeAdsApi;

use Muscobytes\TakeAdsApi\Dto\V1\Api\Stats\Click\ClickRequest;
use Muscobytes\TakeAdsApi\Dto\V1\Api\Stats\Click\ClickRequestParameters;
use Muscobytes\TakeAdsApi\Dto\V1\Monetize\V1\Coupons\CouponsRequest;
use Muscobytes\TakeAdsApi\Dto\V1\Monetize\V1\Coupons\CouponsRequestParameters;
use Muscobytes\TakeAdsApi\Dto\V1\Monetize\V1\CouponSearch\CouponSearchRequest;
use Muscobytes\TakeAdsApi\Dto\V1\Monetize\V1\CouponSearch\CouponSearchRequestParameters;
use Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Merchant\MerchantRequest;
use Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Merchant\MerchantRequestParameters;
use Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Resolve\ResolveRequest;
use Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Resolve\ResolveRequestParameters;
use Muscobytes\TakeAdsApi\Exceptions\ClientErrorException;
use Muscobytes\TakeAdsApi\Exceptions\ServerErrorException;
use Muscobytes\TakeAdsApi\Exceptions\ServiceUnavailableException;
use Muscobytes\TakeAdsApi\Exceptions\UnknownErrorException;
use Muscobytes\TakeAdsApi\Dto\Response;


class Api
{
    public function __construct(
        protected Client $client
    )
    {
        //
    }

    /**
     * @throws ClientErrorException
     * @throws UnknownErrorException
     * @throws ServerErrorException
     * @throws ServiceUnavailableException
     */
    public function resolve(ResolveRequestParameters $parameters): Response
    {
        return $this->client->call(new ResolveRequest($parameters));
    }


    /**
     * @throws ClientErrorException
     * @throws UnknownErrorException
     * @throws ServiceUnavailableException
     * @throws ServerErrorException
     */
    public function merchant(MerchantRequestParameters $parameters): Response
    {
        return $this->client->call(new MerchantRequest($parameters));
    }


    /**
     * @throws ClientErrorException
     * @throws UnknownErrorException
     * @throws ServiceUnavailableException
     * @throws ServerErrorException
     */
    public function coupons(CouponsRequestParameters $parameters): Response
    {
        return $this->client->call(new CouponsRequest($parameters));
    }


    /**
     * @throws ClientErrorException
     * @throws UnknownErrorException
     * @throws ServiceUnavailableException
     * @throws ServerErrorException
     */
    public function searchCoupons(CouponSearchRequestParameters $parameters): Response
    {
        return $this->client->call(new CouponSearchRequest($parameters));
    }


    /**
     * @throws ClientErrorException
     * @throws UnknownErrorException
     * @throws ServiceUnavailableException
     * @throws ServerErrorException
     */
    public function clicksReport(ClickRequestParameters $parameters): Response
    {
        $this->client->call(new ClickRequest($parameters));
    }
}