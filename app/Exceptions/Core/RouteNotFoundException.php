<?php

declare(strict_types=1);

namespace App\Exceptions\Core;

use App\Core\Abstracts\BaseException;

class RouteNotFoundException extends BaseException
{
    protected $message = 'Route not found';
}