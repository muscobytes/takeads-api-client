<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Api\Stats\Click;

use Generator;
use Muscobytes\TakeadsApi\Dto\Response;
use Muscobytes\TakeadsApi\Traits\HasMetaOffset;

/**
 * Get report on clicks
 * https://developers.takeads.com/knowledge-base/article/get-report-on-clicks
 */
final class ClickResponse extends Response
{
    use HasMetaOffset;
}