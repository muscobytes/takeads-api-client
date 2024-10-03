<?php

namespace Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Merchant;

readonly class MerchantDto
{
    /**
     * @param int|null $merchantId Merchant unique identifier
     * @param string $name Merchant name
     * @param string|null $imageUri URI of the merchant’s logo
     * @param string $currencyCode Currency code in ISO 4217:2008 alpha-3 format
     * @param string $defaultDomain Default merchant domain
     * @param array $domains List of merchant domains
     * @param int|null $categoryId List of merchant category IDs
     * @param string|null $description Merchant description
     * @param bool $isActive Status of the merchant. A merchant is active if it has at least one active program
     * @param array $countryCodes List of country codes in ISO 3166-1 alpha-2 format where the program operates
     * @param float|null $averageBasketValue Average purchases number for the merchant
     * @param float|null $averageCommission Average percent of the merchant's commission.
     * @param float|null $averageConfirmationTime Average commission confirmation time in days.
     * @param float|null $averageCancellationRate Average rate of cancelled commission.
     * @param float|null $minimumCommission Minimum commission value.
     * @param float|null $maximumCommission Maximum commission value.
     * @param array $commissionRates List of rewards the publisher can receive from the merchant for each approved
     *      action. These rates reflect the potential earnings for different types of actions performed by the
     *      publisher's audience. The exact reward received depends on the actions validated and approved by the
     *      merchant.
     * @param string $trackingLink Merchant tracking link.
     * @param string $createdAt Timestamp ($ISO 8601) that specifies the date when of the last update of the merchant.
     *      Example: 2021-08-03T19:53:15.816Z
     * @param string $updatedAt Timestamp ($ISO 8601) when information about the merchant was last updated in the Takeads catalog.
     *      Example: 2021-08-03T19:53:15.816Z
     */
    public function __construct(
        public ?int $merchantId,
        public string $name,
        public ?string $imageUri,
        public string $currencyCode,
        public string $defaultDomain,
        public array $domains,
        public ?int $categoryId,
        public ?string $description,
        public bool $isActive,
        public array $countryCodes,
        public ?float $averageBasketValue,
        public ?float $averageCommission,
        public ?float $averageConfirmationTime,
        public ?float $averageCancellationRate,
        public ?float $minimumCommission,
        public ?float $maximumCommission,
        public array $commissionRates,
        public string $trackingLink,
        public string $createdAt,
        public string $updatedAt,
    )
    {
        //
    }
}