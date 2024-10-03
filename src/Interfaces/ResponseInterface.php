<?php

namespace Muscobytes\TakeAdsApi\Interfaces;

use Generator;
use Psr\Http\Message\ResponseInterface as HttpResponseInterface;

interface ResponseInterface
{
    public function getResponse(): HttpResponseInterface;

    public function getData(): Generator;
}