<?php

namespace Muscobytes\TakeadsApi\Tests\Unit;

use Muscobytes\TakeadsApi\Dto\V1\Api\Stats\Click\ClickDto;
use Muscobytes\TakeadsApi\Tests\BaseTest;
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