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
        $this->assertSame($dto->merchantId, $merchant['merchantId']);

        $this->assertIsString($dto->name);
        $this->assertSame($dto->name, $merchant['name']);

        $this->assertSame($dto->imageUri, $merchant['imageUri']);

        $this->assertIsString($dto->currencyCode);
        $this->assertSame($dto->currencyCode, $merchant['currencyCode']);

        $this->assertIsString($dto->defaultDomain);
        $this->assertSame($dto->defaultDomain, $merchant['defaultDomain']);

        $this->assertIsArray($dto->domains);
        $this->assertSame($dto->domains, $merchant['domains']);

        $this->assertSame($dto->categoryId, $merchant['categoryId']);

        $this->assertSame($dto->description, $merchant['description']);

        $this->assertIsBool($dto->isActive);
        $this->assertSame($dto->isActive, $merchant['isActive']);

        $this->assertIsArray($dto->countryCodes);
        $this->assertSame($dto->countryCodes, $merchant['countryCodes']);

        is_null($merchant['averageBasketValue']) ?
            $this->assertNull($dto->averageBasketValue) : $this->assertIsFloat($dto->averageBasketValue);

        is_null($merchant['averageCommission']) ?
            $this->assertNull($dto->averageCommission) : $this->assertIsFloat($dto->averageCommission);

        is_null($merchant['averageConfirmationTime']) ?
            $this->assertNull($dto->averageConfirmationTime) : $this->assertIsFloat($dto->averageConfirmationTime);

        is_null($merchant['averageCancellationRate']) ?
            $this->assertNull($dto->averageCancellationRate) : $this->assertIsFloat($dto->averageCancellationRate);

        is_null($merchant['minimumCommission']) ?
            $this->assertNull($dto->minimumCommission) : $this->assertIsFloat($dto->minimumCommission);

        is_null($merchant['maximumCommission']) ?
            $this->assertNull($dto->maximumCommission) : $this->assertIsFloat($dto->maximumCommission);

        $this->assertIsArray($dto->commissionRates);
        $this->assertSame($dto->commissionRates, $merchant['commissionRates']);

        $this->assertIsString($dto->trackingLink);
        $this->assertSame($dto->trackingLink, $merchant['trackingLink']);

        $this->assertIsString($dto->createdAt);
        $this->assertSame($dto->createdAt, $merchant['createdAt']);

        $this->assertIsString($dto->updatedAt);
        $this->assertSame($dto->updatedAt, $merchant['updatedAt']);
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