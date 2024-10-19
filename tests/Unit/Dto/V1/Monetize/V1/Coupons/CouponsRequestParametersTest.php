<?php

namespace Muscobytes\TakeadsApi\Tests\Unit\Dto\V1\Monetize\V1\Coupons;

use DateTimeInterface;
use Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\Coupons\CouponsRequestParameters;
use Muscobytes\TakeadsApi\Tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(CouponsRequestParameters::class)]
class CouponsRequestParametersTest extends BaseTest
{
    #[DataProvider('createCouponRequestParametersFromArrayDataProvider')]
    public function testCreateCouponRequestParametersFromArray(array $parameters)
    {
        $format = 'Y-m-d\TH:i:s.vp';
        $couponsRequestParameters = CouponsRequestParameters::fromArray($parameters);
        $this->assertInstanceOf(CouponsRequestParameters::class, $couponsRequestParameters);

        if (is_null($parameters['isActive'])) {
            $this->assertNull($couponsRequestParameters->isActive);
        } else {
            $this->assertSame($parameters['isActive'], $couponsRequestParameters->isActive);
            $this->assertTrue($couponsRequestParameters->isActive);
        }

        if (is_null($parameters['updatedAtFrom'])) {
            $this->assertNull($couponsRequestParameters->updatedAtFrom);
        } else {
            $this->assertInstanceOf(DateTimeInterface::class, $couponsRequestParameters->updatedAtFrom);
            $this->assertSame($parameters['updatedAtFrom'], $couponsRequestParameters->updatedAtFrom->format($format));
        }

        if (is_null($parameters['updatedAtTo'])) {
            $this->assertNull($couponsRequestParameters->updatedAtTo);
        } else {
            $this->assertInstanceOf(DateTimeInterface::class, $couponsRequestParameters->updatedAtTo);
            $this->assertSame($parameters['updatedAtTo'], $couponsRequestParameters->updatedAtTo->format($format));
        }

        if (is_null($parameters['startDateBefore'])) {
            $this->assertNull($couponsRequestParameters->startDateBefore);
        } else {
            $this->assertInstanceOf(DateTimeInterface::class, $couponsRequestParameters->startDateBefore);
            $this->assertSame($parameters['startDateBefore'], $couponsRequestParameters->startDateBefore->format($format));
        }

        if (is_null($parameters['endDateAfter'])) {
            $this->assertNull($couponsRequestParameters->endDateAfter);
        } else {
            $this->assertInstanceOf(DateTimeInterface::class, $couponsRequestParameters->endDateAfter);
            $this->assertSame($parameters['endDateAfter'], $couponsRequestParameters->endDateAfter->format($format));
        }

        if (is_null($parameters['languageCodes'])) {
            $this->assertNull($couponsRequestParameters->languageCodes);
        } else {
            $this->assertIsArray($couponsRequestParameters->languageCodes);
            $this->assertCount(count($parameters['languageCodes']), $couponsRequestParameters->languageCodes);
            $this->assertSame($parameters['languageCodes'], $couponsRequestParameters->languageCodes);
        }

        if (is_null($parameters['categoryIds'])) {
            $this->assertNull($couponsRequestParameters->categoryIds);
        } else {
            $this->assertIsArray($couponsRequestParameters->categoryIds);
            $this->assertCount(count($parameters['categoryIds']), $couponsRequestParameters->categoryIds);
            $this->assertSame($parameters['categoryIds'], $couponsRequestParameters->categoryIds);
        }

        if (is_null($parameters['countryCodes'])) {
            $this->assertNull($couponsRequestParameters->countryCodes);
        } else {
            $this->assertIsArray($couponsRequestParameters->countryCodes);
            $this->assertCount(count($parameters['countryCodes']), $couponsRequestParameters->countryCodes);
            $this->assertSame($parameters['countryCodes'], $couponsRequestParameters->countryCodes);
        }

        if (is_null($parameters['next'])) {
            $this->assertNull($couponsRequestParameters->next);
        } else {
            $this->assertIsString($couponsRequestParameters->next);
            $this->assertSame($parameters['next'], $couponsRequestParameters->next);
        }

        if (is_null($parameters['limit'])) {
            $this->assertNull($couponsRequestParameters->limit);
        } else {
            $this->assertIsInt($couponsRequestParameters->limit);
            $this->assertSame($parameters['limit'], $couponsRequestParameters->limit);
        }
    }


    public static function createCouponRequestParametersFromArrayDataProvider(): array
    {
        return [
            [
                'parameters' => [
                    'isActive' => true,
                ]
            ],
            [
                'parameters' => [
                    'updatedAtFrom' => '2024-10-10T00:00:00.000Z',
                ]
            ],
            [
                'parameters' => [
                    'updatedAtTo' => '2023-04-11T00:00:00.000Z'
                ]
            ],
            [
                'parameters' => [
                    'startDateBefore' => '1979-02-19T00:00:00.000Z'
                ]
            ],
            [
                'parameters' => [
                    'endDateAfter' => '2009-12-18T00:00:00.000Z'
                ]
            ],
            [
                'parameters' => [
                    'languageCodes' => []
                ]
            ],
            [
                'parameters' => [
                    'languageCodes' => ['en']
                ]
            ],
            [
                'parameters' => [
                    'languageCodes' => ['en','ru']
                ]
            ],
            [
                'parameters' => [
                    'languageCodes' => ['es','en','ru','lv']
                ]
            ],
            [
                'parameters' => [
                    'categoryIds' => [35]
                ]
            ],
            [
                'parameters' => [
                    'categoryIds' => [35, 42]
                ]
            ],
            [
                'parameters' => [
                    'categoryIds' => [35, 42, 23]
                ]
            ],
            [
                'parameters' => [
                    'countryCodes' => ['RU']
                ]
            ],
            [
                'parameters' => [
                    'countryCodes' => ['RU', 'KZ']
                ]
            ],
            [
                'parameters' => [
                    'countryCodes' => ['RU', 'GE', 'KZ']
                ]
            ],
            [
                'parameters' => [
                    'next' => '1C2xwNiolIGpCaVtLSdbQ'
                ]
            ],
            [
                'parameters' => [
                    'limit' => 300
                ]
            ]
        ];
    }


    public function testFailedToCreateCouponRequestParametersFromArray()
    {
        $this->expectException(\TypeError::class);
        CouponsRequestParameters::fromArray([
            'updatedAtFrom' => 'malformed date string'
        ]);

        $this->expectException(\TypeError::class);
        CouponsRequestParameters::fromArray([
            'updatedAtTo' => 'malformed date string'
        ]);

        $this->expectException(\TypeError::class);
        CouponsRequestParameters::fromArray([
            'startDateBefore' => 'malformed date string'
        ]);

        $this->expectException(\TypeError::class);
        CouponsRequestParameters::fromArray([
            'startDateAfter' => 'malformed date string'
        ]);
    }
}
