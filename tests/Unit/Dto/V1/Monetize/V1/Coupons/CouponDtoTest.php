<?php

namespace  Muscobytes\TakeadsApi\Tests\Unit\Dto\V1\Monetize\V1\Coupons;

use Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\Coupons\CouponDto;
use Muscobytes\TakeadsApi\Tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(CouponDto::class)]
class CouponDtoTest extends BaseTest
{
    #[DataProvider('couponDtoDataProvider')]
    public function testDtoCreatesProperlyFromArray(array $entry)
    {
        $dto = CouponDto::fromArray($entry);
        $this->assertInstanceOf(CouponDto::class, $dto);

        $this->assertIsString($dto->couponId);
        $this->assertSame($entry['couponId'], $dto->couponId);

        $this->assertIsBool($dto->isActive);
        $this->assertSame($entry['isActive'], $dto->isActive);

        $this->assertIsString($dto->trackingLink);
        $this->assertSame($entry['trackingLink'], $dto->trackingLink);

        $this->assertIsString($dto->name);
        $this->assertSame($entry['name'], $dto->name);

        if (is_null($entry['code'])) {
            $this->assertNull($dto->code);
        } else {
            $this->assertIsString($dto->code);
            $this->assertSame($entry['code'], $dto->code);
        }

        $this->assertIsInt($dto->merchantId);
        $this->assertSame($entry['merchantId'], $dto->merchantId);

        $this->assertIsString($dto->imageUri);
        $this->assertSame($entry['imageUri'], $dto->imageUri);

        $this->assertIsArray($dto->languageCodes);
        $this->assertSame($entry['languageCodes'], $dto->languageCodes);

        $this->assertIsArray($dto->countryCodes);
        $this->assertSame($entry['countryCodes'], $dto->countryCodes);

        $this->assertIsObject($dto->startDate);
        $this->assertSame($entry['startDate'], $dto->startDate->format('Y-m-d\TH:i:s.v\Z'));

        if (is_null($entry['endDate'])) {
            $this->assertNull($dto->endDate);
        } else {
            $this->assertIsObject($dto->endDate);
            $this->assertSame($entry['endDate'], $dto->endDate->format('Y-m-d\TH:i:s.v\Z'));
        }

        if (is_null($entry['description'])) {
            $this->assertNull($dto->description);
        } else {
            $this->assertIsString($dto->description);
            $this->assertSame($entry['description'], $dto->description);
        }

        $this->assertIsArray($dto->categoryIds);
        $this->assertSame($entry['categoryIds'], $dto->categoryIds);

        $this->assertIsObject($dto->createdAt);
        $this->assertSame($entry['createdAt'], $dto->createdAt->format('Y-m-d\TH:i:s.v\Z'));

        $this->assertIsObject($dto->updatedAt);
        $this->assertSame($entry['updatedAt'], $dto->updatedAt->format('Y-m-d\TH:i:s.v\Z'));
    }


    public static function couponDtoDataProvider(): array
    {
        return self::loadFixtures(
            folder: 'coupon'
        );
    }
}
