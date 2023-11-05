<?php

declare(strict_types=1);


namespace App\Controllers\Core;

use App\Core\Abstracts\BaseController;

class HomeController extends BaseController
{
    protected string $template = 'core.home';
}