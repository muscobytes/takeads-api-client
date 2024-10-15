<?php

namespace Muscobytes\TakeadsApi\Tests\Unit\Traits;

use Muscobytes\TakeadsApi\Dto\V1\Monetize\V2\Resolve\ResolveRequestParameters;
use Muscobytes\TakeadsApi\Tests\BaseTest;
use Muscobytes\TakeadsApi\Traits\ToArray;

class ToArrayTest extends BaseTest
{
    use ToArray;

    /**
     * @covers ToArray::toArray
     */
    public function testToArray()
    {
        $dto = new ResolveRequestParameters(
            iris: ['https://aliexpress.com']
        );
        $array = $dto->toArray();
        $this->assertIsArray($array);
        $this->assertNotEmpty($array);
        $this->assertArrayHasKey('iris', $array);
        $this->assertIsArray($array['iris']);
        $this->assertCount(1, $array['iris']);
        $this->assertArrayNotHasKey('subid', $array);
        $this->assertArrayHasKey('withImages', $array);
        $this->assertIsBool($array['withImages']);
        $this->assertSame(false, $array['withImages']);
    }
}
