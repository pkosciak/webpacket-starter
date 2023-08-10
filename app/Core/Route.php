<?php

declare(strict_types=1);


namespace App\Core;

use App\Enums\Core\ApiState;

#[\Attribute]
class Route
{
    public function __construct(public readonly ApiState $state){}
}