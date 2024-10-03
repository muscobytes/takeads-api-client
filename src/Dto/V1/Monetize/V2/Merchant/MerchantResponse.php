<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Merchant;

use Generator;
use Muscobytes\TakeAdsApi\Dto\Response;
use Muscobytes\TakeAdsApi\Traits\HasMeta;

/**
 * Get list of merchants
 * https://developers.takeads.com/knowledge-base/article/get-list-of-merchants
 */
final class MerchantResponse extends Response
{
    use HasMeta;

    public function getData(): Generator
    {
        foreach (json_decode($this->getResponse()->getBody(), true)['data'] as $item) {
            yield new MerchantDto(...$item);
        }
    }
}