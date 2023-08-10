<?php

declare(strict_types=1);


namespace App\Controllers\Core;

use App\Core\Abstracts\BaseController;

use App\Core\View;

class ArchiveController extends BaseController
{
    public function render(): void
    {
        $data = ['controller' => $this->controller];
        $data = apply_filters('filter_archivecontroller_data', $data);
        $this->view->setData($data);
        $this->view->render('core.archive');
    }
}