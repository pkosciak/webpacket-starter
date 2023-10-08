<?php

declare(strict_types=1);

namespace App\Core\Abstracts;

use App\Core\Interfaces\ControllerInterface;
use App\Core\Traits\Modular;
use App\Core\View;

abstract class BaseController
{
    use Modular;

    protected string $controller;

    public function __construct(protected View $view)
    {
        $this->setupModule();
        $this->controller = static::class;
    }
}
