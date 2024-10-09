<?php

namespace Muscobytes\TakeadsApi\Traits;

use Muscobytes\TakeadsApi\Dto\ResponseMetaNext;
use Muscobytes\TakeadsApi\Exceptions\ResponseMetaIsMissingException;

trait HasMetaNext
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