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


    public function getData(): Generator
    {
        $body = json_decode($this->getResponse()->getBody(), true);
        foreach ($body['data'] as $item) {
            yield MerchantDto::fromArray($item);
        }
    }
}
