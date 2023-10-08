<?php

declare(strict_types=1);

namespace App\Core\Abstracts;

use App\Core\Traits\Modular;

abstract class BaseExtension
{
    use Modular;

    public function __construct()
    {
        $this->setupModule();
    }
}
