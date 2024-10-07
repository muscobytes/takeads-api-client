<?php

namespace Muscobytes\TakeAdsApi\Tests\Unit;

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
        $dto = new MerchantDto(...$merchant);
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

        is_null($merchant['averageBasketValue']) ?
            $this->assertNull($dto->averageBasketValue) : $this->assertIsFloat($dto->averageBasketValue);
        $this->assertSame($merchant['averageBasketValue'], $dto->averageBasketValue);

        is_null($merchant['averageCommission']) ?
            $this->assertNull($dto->averageCommission) : $this->assertIsFloat($dto->averageCommission);
        $this->assertSame($merchant['averageCommission'], $dto->averageCommission);

        is_null($merchant['averageConfirmationTime']) ?
            $this->assertNull($dto->averageConfirmationTime) : $this->assertIsFloat($dto->averageConfirmationTime);
        $this->assertSame($merchant['averageConfirmationTime'], $dto->averageConfirmationTime);

        is_null($merchant['averageCancellationRate']) ?
            $this->assertNull($dto->averageCancellationRate) : $this->assertIsFloat($dto->averageCancellationRate);
        $this->assertSame($merchant['averageCancellationRate'], $dto->averageCancellationRate);

        is_null($merchant['minimumCommission']) ?
            $this->assertNull($dto->minimumCommission) : $this->assertIsFloat($dto->minimumCommission);
        $this->assertSame($merchant['minimumCommission'], $dto->minimumCommission);

        is_null($merchant['maximumCommission']) ?
            $this->assertNull($dto->maximumCommission) : $this->assertIsFloat($dto->maximumCommission);
        $this->assertSame($merchant['maximumCommission'], $dto->maximumCommission);

        $this->assertIsArray($dto->commissionRates);
        $this->assertSame($merchant['commissionRates'], $dto->commissionRates);

        $this->assertIsString($dto->trackingLink);
        $this->assertSame($merchant['trackingLink'], $dto->trackingLink);

        $this->assertIsString($dto->createdAt);
        $this->assertSame($merchant['createdAt'], $dto->createdAt);

        $this->assertIsString($dto->updatedAt);
        $this->assertSame($merchant['updatedAt'], $dto->updatedAt);
    }


    public static function merchantDataProvider(): array
    {
        $result = [];
        $fixturesPath = __DIR__ . '/../fixtures/merchant/';
        if ($handle = opendir($fixturesPath)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $result[]['merchant'] = json_decode(file_get_contents($fixturesPath . $entry), true);
                }
            }
            closedir($handle);
        }
        return $result;
    }
}