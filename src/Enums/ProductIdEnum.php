<?php

namespace Muscobytes\TakeAdsApi\Enums;

enum ProductIdEnum: string
{
    case MONETIZE_LINK_SCRIPT = 'MONETIZE_LINK_SCRIPT';
    case MONETIZE_LINK_API = 'MONETIZE_LINK_API';
    case MONETIZE_API = 'MONETIZE_API';
    case MONETIZE_SEARCH_API = 'MONETIZE_SEARCH_API';
    case MONETIZE_SUGGEST = 'MONETIZE_SUGGEST';
}
