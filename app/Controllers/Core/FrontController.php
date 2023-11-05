<?php

declare(strict_types=1);


namespace App\Controllers\Core;

use App\Core\Abstracts\BaseController;

class FrontController extends BaseController
{
    protected string $template = 'core.front';
}