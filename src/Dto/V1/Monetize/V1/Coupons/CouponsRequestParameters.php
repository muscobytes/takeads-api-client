<?php

namespace Muscobytes\TakeadsApi\Dto\V1\Monetize\V1\Coupons;

use DateTimeInterface;
use Muscobytes\TakeadsApi\Dto\RequestParameters;
use Muscobytes\TakeadsApi\Traits\Casts\CastDatetime;

/**
 * Get coupons
 * https://developers.takeads.com/knowledge-base/article/get-coupons
 */
final class CouponsRequestParameters extends RequestParameters
{
    use CastDatetime;

    public function __construct(
        public ?bool              $isActive = null,
        public ?DateTimeInterface $updatedAtFrom = null,
        public ?DateTimeInterface $updatedAtTo = null,
        public ?DateTimeInterface $startDateBefore = null,
        public ?DateTimeInterface $endDateAfter = null,
        public ?array             $languageCodes = null,
        public ?array             $categoryIds = null,
        public ?array             $countryCodes = null,
        public ?string            $next = null,
        public ?int               $limit = null
    )
    {
        //
    }


    public static function fromArray(array $array): self
    {
        $properties = [
            'isActive',
            'updatedAtFrom',
            'updatedAtTo',
            'startDateBefore',
            'endDateAfter',
            'languageCodes',
            'categoryIds',
            'countryCodes',
            'next',
            'limit'
        ];

        return new self(...array_map(
            function ($propertyName) use ($array) {
                $castDateTime = [
                    'updatedAtFrom',
                    'updatedAtTo',
                    'startDateBefore',
                    'endDateAfter',
                ];
                if (key_exists($propertyName, $array)) {
                    if (in_array($propertyName, $castDateTime)) {
                        return self::castDatetime($array[$propertyName] . 'T00:00:00.000Z');
                    }
                    return $array[$propertyName];
                }
                return null;
            },
            $properties
        ));
    }
}