<?php

namespace Muscobytes\TakeadsApi\Tests\Unit\Traits\Casts;

use DateTimeInterface;
use Muscobytes\TakeadsApi\Tests\BaseTest;
use Muscobytes\TakeadsApi\Traits\Casts\CastDatetime;
use PHPUnit\Framework\Attributes\CoversClass;
use ReflectionClass;
use ReflectionException;


#[CoversClass(CastDatetime::class)]
class CastDatetimeTest extends BaseTest
{
    /**
     * @throws ReflectionException
     */
    public function testCastDatetime()
    {
        $class = new class {
            use CastDatetime;
        };

        $reflection = new ReflectionClass($class);
        $castDatetimeMethod = $reflection->getMethod('castDatetime');
        $castDatetimeMethod->setAccessible(true);

        $value = '2024-10-19T12:57:00.000Z';
        $datetime = $castDatetimeMethod->invoke($reflection, $value);
        $this->assertInstanceOf(DateTimeInterface::class, $datetime);
        $this->assertEquals($value, $datetime->format($class::$FORMAT_ISO_8601));

        $value = 'malformed date time';
        $datetime = $castDatetimeMethod->invoke($reflection, $value);
        $this->assertIsBool($datetime);
        $this->assertFalse($datetime);

        $castDateMethod = $reflection->getMethod('castDate');
        $castDateMethod->setAccessible(true);
        $value = '2024-10-19';
        $date = $castDateMethod->invoke($reflection, $value);
        $this->assertInstanceOf(DateTimeInterface::class, $date);
        $this->assertEquals($value, $date->format($class::$FORMAT_DATE_ISO_8601_1988E));

        $value = 'malformed date';
        $date = $castDateMethod->invoke($reflection, $value);
        $this->assertIsBool($date);
        $this->assertFalse($date);
    }
}