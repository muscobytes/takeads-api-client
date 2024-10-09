<?php

namespace Muscobytes\TakeadsApi\Traits;

use Muscobytes\TakeadsApi\Dto\ResponseMetaOffset;
use Muscobytes\TakeadsApi\Exceptions\ResponseMetaIsMissingException;

trait HasMetaOffset
{
    protected string $key = 'meta';

    /**
     * @throws ResponseMetaIsMissingException
     */
    public function getMeta(): ResponseMetaOffset
    {
        $payload = json_decode($this->getResponse()->getBody(), true);
        if (!array_key_exists($this->key, $payload)) {
            throw new ResponseMetaIsMissingException('The response meta is missing.', 100);
        }
        return new ResponseMetaOffset(...$payload[$this->key]);
    }

}