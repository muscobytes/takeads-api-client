<?php

namespace Muscobytes\TakeAdsApi\Tests\Unit;

use Muscobytes\TakeAdsApi\Dto\V1\Api\Stats\Click\ClickDto;
use Muscobytes\TakeAdsApi\Tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(ClickDto::class)]
class ClickDtoTest extends BaseTest
{
    #[DataProvider('clickDataProvider')]
    public function testDtoCreatesProperlyFromArray(array $entry)
    {
        $dto = ClickDto::fromArray($entry);
        $this->assertInstanceOf(ClickDto::class, $dto);
    }


    public static function clickDataProvider(): array
    {
        return self::loadFixtures(
            folder: 'click'
        );
    }
}