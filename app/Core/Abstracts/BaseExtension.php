<?php

declare(strict_types=1);

namespace App\Core\Abstracts;

use App\Core\Interfaces\ExtensionInterface;
use App\Core\Traits\Modular;

abstract class BaseExtension implements ExtensionInterface
{
    use Modular;

    public function __construct()
    {
        $this->setupModule();
        $this->init();
    }
}
