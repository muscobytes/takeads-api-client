<?php

namespace Muscobytes\TakeadsApi\Enums;

enum PricingModelEnum: string
{
    case LEAD = 'LEAD';
    case SALE = 'SALE';
    case CLICK = 'CLICK';
    case BONUS = 'BONUS';
}
