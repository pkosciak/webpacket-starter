<?php

declare(strict_types=1);


namespace App\Controllers\Core;

use App\Core\Abstracts\BaseController;

use App\Core\View;

class ArchiveController extends BaseController
{
    protected string $template = 'core.archive';
}