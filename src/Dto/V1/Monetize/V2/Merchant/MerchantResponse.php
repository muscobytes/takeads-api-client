<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Merchant;

use Generator;
use Muscobytes\TakeadsApi\Dto\Response;
use Muscobytes\TakeadsApi\Traits\HasMetaNext;

/**
 * Get list of merchants
 * https://developers.takeads.com/knowledge-base/article/get-list-of-merchants
 */
final class MerchantResponse extends Response
{
    use HasMetaNext;
}
