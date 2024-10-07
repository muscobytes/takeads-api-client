<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Merchant;

use Generator;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Traits\HasMetaNext;

/**
 * Get list of merchants
 * https://developers.takeads.com/knowledge-base/article/get-list-of-merchants
 */
final class MerchantResponse extends Response
{
    use HasMetaNext;

    protected function getComissionRates(array $rates): array
    {
        $result = [];
        foreach ($rates as $rate) {
            $result[] = new CommissionRate(...$rate);
        }
        return $result;
    }


    public function getData(): Generator
    {
        foreach (json_decode($this->getResponse()->getBody(), true)['data'] as $item) {
            yield new MerchantDto(
                merchantId: $item['merchantId'],
                name: $item['name'],
                imageUri: $item['imageUri'],
                currencyCode: $item['currencyCode'],
                defaultDomain: $item['defaultDomain'],
                domains: $item['domains'],
                categoryId: $item['categoryId'],
                description: $item['description'],
                isActive: $item['isActive'],
                countryCodes: $item['countryCodes'],
                averageBasketValue: $item['averageBasketValue'],
                averageCommission: $item['averageCommission'],
                averageConfirmationTime: $item['averageConfirmationTime'],
                averageCancellationRate: $item['averageCancellationRate'],
                minimumCommission: $item['minimumCommission'],
                maximumCommission: $item['maximumCommission'],
                commissionRates: $this->getComissionRates($item['commissionRates']),
                trackingLink: $item['trackingLink'],
                createdAt: $item['createdAt'],
                updatedAt: $item['updatedAt'],
            );
        }
    }
}