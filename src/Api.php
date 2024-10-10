<?php

namespace Muscobytes\TakeadsApi;

use Muscobytes\TakeadsApi\Dto\Response;
use Muscobytes\TakeadsApi\Dto\V1\Api\Stats\Click\ClickRequest;
use Muscobytes\TakeadsApi\Dto\V1\Api\Stats\Click\ClickRequestParameters;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\Coupons\CouponsRequest;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\Coupons\CouponsRequestParameters;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\CouponSearch\CouponSearchRequest;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\CouponSearch\CouponSearchRequestParameters;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Merchant\MerchantRequest;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Merchant\MerchantRequestParameters;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Resolve\ResolveRequest;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Resolve\ResolveRequestParameters;
use Muscobytes\TakeadsApi\Exceptions\ClientErrorException;
use Muscobytes\TakeadsApi\Exceptions\ServerErrorException;
use Muscobytes\TakeadsApi\Exceptions\ServiceUnavailableException;
use Muscobytes\TakeadsApi\Exceptions\UnknownErrorException;


readonly class Api
{
    public function __construct(
        private Client $client
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
        return $this->client->call(new ClickRequest($parameters));
    }
}
