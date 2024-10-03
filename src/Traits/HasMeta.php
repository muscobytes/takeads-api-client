<?php

namespace Muscobytes\TakeAdsApi\Traits;

use Muscobytes\TakeAdsApi\Dto\ResponseMeta;
use Muscobytes\TakeAdsApi\Exceptions\ResponseMetaIsMissingException;

trait HasMeta
{
    protected string $key = 'meta';

    /**
     * @throws ResponseMetaIsMissingException
     */
    public function getMeta(): ResponseMeta
    {
        $payload = json_decode($this->getResponse()->getBody(), true);
        if (!array_key_exists($this->key, $payload)) {
            throw new ResponseMetaIsMissingException('The response meta is missing.', 100);
        }
        return new ResponseMeta(...$payload[$this->key]);
    }
}