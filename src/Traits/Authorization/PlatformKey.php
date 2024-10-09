<?php

namespace Muscobytes\TakeadsApi\Traits\Authorization;

use Muscobytes\TakeadsApi\Enums\AuthorizationKeyEnum;

trait PlatformKey
{
    public function getAuthorizationKeyType(): AuthorizationKeyEnum
    {
        return AuthorizationKeyEnum::PLATFORM;
    }
}