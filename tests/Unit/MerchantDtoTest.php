<?php

namespace Muscobytes\TakeAdsApi\Tests\Unit;

use DateTimeInterface;
use Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Merchant\CommissionRate;
use Muscobytes\TakeAdsApi\Dto\V1\Monetize\V2\Merchant\MerchantDto;
use Muscobytes\TakeAdsApi\Tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(MerchantDto::class)]
class MerchantDtoTest extends BaseTest
{
    #[DataProvider('merchantDataProvider')]
    public function testDtoCreatesProperly(array $entry)
    {
        $dto = MerchantDto::fromArray($entry);
        $this->assertInstanceOf(MerchantDto::class, $dto);

        $this->assertIsInt($dto->merchantId);
        $this->assertSame($entry['merchantId'], $dto->merchantId);

        $this->assertIsString($dto->name);
        $this->assertSame($entry['name'], $dto->name);

        $this->assertSame($entry['imageUri'], $dto->imageUri);

        $this->assertIsString($dto->currencyCode);
        $this->assertSame($entry['currencyCode'], $dto->currencyCode);

        $this->assertIsString($dto->defaultDomain);
        $this->assertSame($entry['defaultDomain'], $dto->defaultDomain);

        $this->assertIsArray($dto->domains);
        $this->assertSame($entry['domains'], $dto->domains);
        foreach ($entry['domains'] as $domain) {
            $this->assertIsString($domain);
    }

        $this->assertSame($entry['categoryId'], $dto->categoryId);

        $this->assertSame($entry['description'], $dto->description);

        $this->assertIsBool($dto->isActive);
        $this->assertSame($entry['isActive'], $dto->isActive);

        $this->assertIsArray($dto->countryCodes);
        $this->assertSame($entry['countryCodes'], $dto->countryCodes);

        if (!is_null($entry['averageBasketValue'])) {
            $this->assertIsFloat($dto->averageBasketValue);
            $this->assertSame((float)$entry['averageBasketValue'], $dto->averageBasketValue);
        }

        if(!is_null($entry['averageCommission'])) {
            $this->assertIsFloat($dto->averageCommission);
            $this->assertSame((float)$entry['averageCommission'], $dto->averageCommission);
        }

        if(!is_null($entry['averageConfirmationTime'])) {
            $this->assertIsFloat($dto->averageConfirmationTime);
            $this->assertSame((float)$entry['averageConfirmationTime'], $dto->averageConfirmationTime);
        }

        if(!is_null($entry['averageCancellationRate'])) {
            $this->assertIsFloat($dto->averageCancellationRate);
            $this->assertSame((float)$entry['averageCancellationRate'], $dto->averageCancellationRate);
        }

        if(!is_null($entry['minimumCommission'])) {
            $this->assertIsFloat($dto->minimumCommission);
            $this->assertSame((float)$entry['minimumCommission'], $dto->minimumCommission);
        }

        if(!is_null($entry['maximumCommission'])) {
            $this->assertIsFloat($dto->maximumCommission);
            $this->assertSame($entry['maximumCommission'], $dto->maximumCommission);
        }

        $this->assertIsArray($dto->commissionRates);
        foreach ($dto->commissionRates as $key => $commissionRate) {
            $this->assertInstanceOf(CommissionRate::class, $commissionRate);

            if (!is_null($commissionRate->fixedCommission)) {
                $this->assertIsFloat($commissionRate->fixedCommission);
                $this->assertSame(
                    (float)$entry['commissionRates'][$key]['fixedCommission'],
                    $commissionRate->fixedCommission
                );
            }

            if (!is_null($commissionRate->percentageCommission)) {
                $this->assertIsFloat($commissionRate->percentageCommission);
                $this->assertSame(
                    (float)$entry['commissionRates'][$key]['percentageCommission'],
                    $commissionRate->percentageCommission
                );
            }
        }

        $this->assertIsString($dto->trackingLink);
        $this->assertSame($entry['trackingLink'], $dto->trackingLink);

        $this->assertInstanceOf(DateTimeInterface::class, $dto->createdAt);
        $this->assertSame(
            $entry['createdAt'],
            $dto->createdAt->format(MerchantDto::FORMAT_ISO_8601)
        );

        $this->assertInstanceOf(DateTimeInterface::class, $dto->updatedAt);
        $this->assertSame(
            $entry['updatedAt'],
            $dto->updatedAt->format(MerchantDto::FORMAT_ISO_8601)
        );
    }


    public static function merchantDataProvider(): array
    {
        return self::loadFixtures(
            folder: 'merchant'
        );
    }
}