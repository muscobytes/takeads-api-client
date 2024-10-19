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
    public function testCreateCouponRequestParametersFromArray(array $array)
    {
        $params = CouponsRequestParameters::fromArray($array);
        $this->assertInstanceOf(CouponsRequestParameters::class, $params);

        if (is_null($array['isActive'])) {
            $this->assertNull($params->isActive);
        } else {
            $this->assertSame($array['isActive'], $params->isActive);
            $this->assertTrue($params->isActive);
        }

        if (is_null($array['updatedAtFrom'])) {
            $this->assertNull($params->updatedAtFrom);
        } else {
            $this->assertInstanceOf(DateTimeInterface::class, $params->updatedAtFrom);
            $this->assertSame(
                $array['updatedAtFrom'],
                $params->updatedAtFrom->format($params::$FORMAT_DATE_ISO_8601_1988E)
            );
        }

        if (is_null($array['updatedAtTo'])) {
            $this->assertNull($params->updatedAtTo);
        } else {
            $this->assertInstanceOf(DateTimeInterface::class, $params->updatedAtTo);
            $this->assertSame(
                $array['updatedAtTo'],
                $params->updatedAtTo->format($params::$FORMAT_DATE_ISO_8601_1988E)
            );
        }

        if (is_null($array['startDateBefore'])) {
            $this->assertNull($params->startDateBefore);
        } else {
            $this->assertInstanceOf(DateTimeInterface::class, $params->startDateBefore);
            $this->assertSame(
                $array['startDateBefore'],
                $params->startDateBefore->format($params::$FORMAT_DATE_ISO_8601_1988E)
            );
        }

        if (is_null($array['endDateAfter'])) {
            $this->assertNull($params->endDateAfter);
        } else {
            $this->assertInstanceOf(DateTimeInterface::class, $params->endDateAfter);
            $this->assertSame(
                $array['endDateAfter'],
                $params->endDateAfter->format($params::$FORMAT_DATE_ISO_8601_1988E)
            );
        }

        if (is_null($array['languageCodes'])) {
            $this->assertNull($params->languageCodes);
        } else {
            $this->assertIsArray($params->languageCodes);
            $this->assertCount(count($array['languageCodes']), $params->languageCodes);
            $this->assertSame($array['languageCodes'], $params->languageCodes);
        }

        if (is_null($array['categoryIds'])) {
            $this->assertNull($params->categoryIds);
        } else {
            $this->assertIsArray($params->categoryIds);
            $this->assertCount(count($array['categoryIds']), $params->categoryIds);
            $this->assertSame($array['categoryIds'], $params->categoryIds);
        }

        if (is_null($array['countryCodes'])) {
            $this->assertNull($params->countryCodes);
        } else {
            $this->assertIsArray($params->countryCodes);
            $this->assertCount(count($array['countryCodes']), $params->countryCodes);
            $this->assertSame($array['countryCodes'], $params->countryCodes);
        }

        if (is_null($array['next'])) {
            $this->assertNull($params->next);
        } else {
            $this->assertIsString($params->next);
            $this->assertSame($array['next'], $params->next);
        }

        if (is_null($array['limit'])) {
            $this->assertNull($params->limit);
        } else {
            $this->assertIsInt($params->limit);
            $this->assertSame($array['limit'], $params->limit);
        }
    }


    public static function createCouponRequestParametersFromArrayDataProvider(): array
    {
        return [
            [
                'array' => [
                    'isActive' => true,
                ]
            ],
            [
                'array' => [
                    'updatedAtFrom' => '2024-10-10',
                ]
            ],
            [
                'array' => [
                    'updatedAtTo' => '2023-04-11'
                ]
            ],
            [
                'array' => [
                    'startDateBefore' => '1979-02-19'
                ]
            ],
            [
                'array' => [
                    'endDateAfter' => '2009-12-18'
                ]
            ],
            [
                'array' => [
                    'languageCodes' => []
                ]
            ],
            [
                'array' => [
                    'languageCodes' => ['en']
                ]
            ],
            [
                'array' => [
                    'languageCodes' => ['en','ru']
                ]
            ],
            [
                'array' => [
                    'languageCodes' => ['es','en','ru','lv']
                ]
            ],
            [
                'array' => [
                    'categoryIds' => [35]
                ]
            ],
            [
                'array' => [
                    'categoryIds' => [35, 42]
                ]
            ],
            [
                'array' => [
                    'categoryIds' => [35, 42, 23]
                ]
            ],
            [
                'array' => [
                    'countryCodes' => ['RU']
                ]
            ],
            [
                'array' => [
                    'countryCodes' => ['RU', 'KZ']
                ]
            ],
            [
                'array' => [
                    'countryCodes' => ['RU', 'GE', 'KZ']
                ]
            ],
            [
                'array' => [
                    'next' => '1C2xwNiolIGpCaVtLSdbQ'
                ]
            ],
            [
                'array' => [
                    'limit' => 300
                ]
            ]
        ];
    }
}
