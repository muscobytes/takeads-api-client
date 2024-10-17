<?php

namespace Muscobytes\TakeadsApi\Interfaces;

use Psr\Http\Message\ResponseInterface as HttpResponseInterface;

interface ResponseInterface
{
    public function getResponse(): HttpResponseInterface;

    public function getPayload(): array;
}