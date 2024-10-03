<?php

namespace Muscobytes\TakeAdsApi\Traits;

use Muscobytes\TakeAdsApi\Dto\ResponseMetaNext;
use Muscobytes\TakeAdsApi\Exceptions\ResponseMetaIsMissingException;

trait HasMeta
{
    protected string $key = 'meta';

    /**
     * @throws ResponseMetaIsMissingException
     */
    public function getMeta(): ResponseMetaNext
    {
        $payload = json_decode($this->getResponse()->getBody(), true);
        if (!array_key_exists($this->key, $payload)) {
            throw new ResponseMetaIsMissingException('The response meta is missing.', 100);
        }
        return new ResponseMetaNext(...$payload[$this->key]);
    }
}