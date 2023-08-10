<?php

declare(strict_types=1);

namespace App\Core\Abstracts;

use App\Core\Traits\Modular;

abstract class BaseRestApi {
    use Modular;
    public function __construct(){}
}
