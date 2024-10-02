<?php

namespace Muscobytes\TakeAdsApi\Interfaces;

interface RequestParametersInterface
{
    public function removeNullValues(array $parameters): array;

    public function toArray(): array;
}