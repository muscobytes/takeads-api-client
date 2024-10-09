<?php

namespace Muscobytes\TakeadsApi\Tests\Unit;

use Muscobytes\TakeadsApi\Tests\BaseTest;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\CouponSearch\CouponDto;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(CouponDto::class)]
class CouponSearchDtoTest extends BaseTest
{
    #[DataProvider('couponSearchDtoDataProvider')]
    public function testConstruct(array $entry)
    {
        $dto = CouponDto::fromArray($entry);
        $this->assertInstanceOf(CouponDto::class, $dto);
    }


    public static function couponSearchDtoDataProvider(): array
    {
        return self::loadFixtures(
            folder: 'couponsearch'
        );
    }
}
