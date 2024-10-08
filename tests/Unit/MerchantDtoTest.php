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
    public function testDtoCreatesProperly(array $merchant)
    {
        $dto = MerchantDto::fromArray($merchant);
        $this->assertInstanceOf(MerchantDto::class, $dto);

        $this->assertIsInt($dto->merchantId);
        $this->assertSame($merchant['merchantId'], $dto->merchantId);

        $this->assertIsString($dto->name);
        $this->assertSame($merchant['name'], $dto->name);

        $this->assertSame($merchant['imageUri'], $dto->imageUri);

        $this->assertIsString($dto->currencyCode);
        $this->assertSame($merchant['currencyCode'], $dto->currencyCode);

        $this->assertIsString($dto->defaultDomain);
        $this->assertSame($merchant['defaultDomain'], $dto->defaultDomain);

        $this->assertIsArray($dto->domains);
        $this->assertSame($merchant['domains'], $dto->domains);

        $this->assertSame($merchant['categoryId'], $dto->categoryId);

        $this->assertSame($merchant['description'], $dto->description);

        $this->assertIsBool($dto->isActive);
        $this->assertSame($merchant['isActive'], $dto->isActive);

        $this->assertIsArray($dto->countryCodes);
        $this->assertSame($merchant['countryCodes'], $dto->countryCodes);

        if (!is_null($merchant['averageBasketValue'])) {
            $this->assertIsFloat($dto->averageBasketValue);
            $this->assertSame((float)$merchant['averageBasketValue'], $dto->averageBasketValue);
        }

        if(!is_null($merchant['averageCommission'])) {
            $this->assertIsFloat($dto->averageCommission);
            $this->assertSame((float)$merchant['averageCommission'], $dto->averageCommission);
        }

        if(!is_null($merchant['averageConfirmationTime'])) {
            $this->assertIsFloat($dto->averageConfirmationTime);
            $this->assertSame((float)$merchant['averageConfirmationTime'], $dto->averageConfirmationTime);
        }

        if(!is_null($merchant['averageCancellationRate'])) {
            $this->assertIsFloat($dto->averageCancellationRate);
            $this->assertSame((float)$merchant['averageCancellationRate'], $dto->averageCancellationRate);
        }

        if(!is_null($merchant['minimumCommission'])) {
            $this->assertIsFloat($dto->minimumCommission);
            $this->assertSame((float)$merchant['minimumCommission'], $dto->minimumCommission);
        }

        if(!is_null($merchant['maximumCommission'])) {
            $this->assertIsFloat($dto->maximumCommission);
            $this->assertSame($merchant['maximumCommission'], $dto->maximumCommission);
        }

        $this->assertIsArray($dto->commissionRates);
        foreach ($dto->commissionRates as $key => $commissionRate) {
            $this->assertInstanceOf(CommissionRate::class, $commissionRate);

            if (!is_null($commissionRate->fixedCommission)) {
                $this->assertIsFloat($commissionRate->fixedCommission);
                $this->assertSame(
                    (float)$merchant['commissionRates'][$key]['fixedCommission'],
                    $commissionRate->fixedCommission
                );
            }

            if (!is_null($commissionRate->percentageCommission)) {
                $this->assertIsFloat($commissionRate->percentageCommission);
                $this->assertSame(
                    (float)$merchant['commissionRates'][$key]['percentageCommission'],
                    $commissionRate->percentageCommission
                );
            }
        }

        $this->assertIsString($dto->trackingLink);
        $this->assertSame($merchant['trackingLink'], $dto->trackingLink);

        $this->assertInstanceOf(DateTimeInterface::class, $dto->createdAt);
        $this->assertSame(
            $merchant['createdAt'],
            $dto->createdAt->format(MerchantDto::DATE_FORMAT)
        );

        $this->assertInstanceOf(DateTimeInterface::class, $dto->updatedAt);
        $this->assertSame(
            $merchant['updatedAt'],
            $dto->updatedAt->format(MerchantDto::DATE_FORMAT)
        );
    }


    public static function merchantDataProvider(): array
    {
        return self::loadFixtures(
            folder: 'merchant'
        );
    }
}