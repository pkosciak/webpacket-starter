<?php

declare(strict_types=1);

namespace App\Enums\Core;

/**
 * Status codes for ajax/rest api routes
 * @since 1.0.0
 */
enum ApiState
{
    case LOGGED_IN;
    CASE LOGGED_OUT;
    CASE BOTH;
}