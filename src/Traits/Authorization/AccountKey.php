<?php

namespace Muscobytes\TakeadsApi\Traits\Authorization;

use Muscobytes\TakeadsApi\Enums\AuthorizationKeyEnum;

trait AccountKey
{
    public function getAuthorizationKeyType(): AuthorizationKeyEnum
    {
        return AuthorizationKeyEnum::ACCOUNT;
    }
}