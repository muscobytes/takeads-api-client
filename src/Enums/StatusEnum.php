<?php

namespace Muscobytes\TakeAdsApi\Enums;

/**
 * Get report on actions
 * https://developers.takeads.com/knowledge-base/article/get-report-on-actions
 *
 * Action status.
 * Possible values:
 *  - PENDING,
 *  - CONFIRMED,
 *  - CANCELED,
 *  - SETTLED.
 *
 * Example: PENDING
 *
 * Actions automatically transition from the CONFIRMED to SETTLED status after 45–50 days, without any changes
 * in the status or publisher revenue.
 *
 * Example: an action transitioned to the CONFIRMED status on 05/07/2024. If within the next 45 days this action
 * doesn't transition to another status or have a revenue change, then it will be marked as SETTLED.
 */
enum StatusEnum
{
    case PENDING;
    case CONFIRMED;
    case CANCELED;
    case SETTLED;
}
