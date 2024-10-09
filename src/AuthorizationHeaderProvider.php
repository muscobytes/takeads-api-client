<?php

namespace Muscobytes\TakeadsApi;


use Muscobytes\TakeadsApi\Enums\AuthorizationKeyEnum;

readonly class AuthorizationHeaderProvider
{
    public function __construct(
        private ?string $accountBearer = null,
        private ?string $platformKey = null,
    )
    {
        //
    }


    public function getBearer(AuthorizationKeyEnum $type): string
    {
        return match ($type) {
            AuthorizationKeyEnum::PLATFORM => $this->platformKey,
            AuthorizationKeyEnum::ACCOUNT => $this->accountBearer,
        };
    }
}
