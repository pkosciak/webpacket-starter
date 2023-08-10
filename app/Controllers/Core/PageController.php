<?php

declare(strict_types=1);


namespace App\Controllers\Core;

use App\Core\Abstracts\BaseController;

class PageController extends BaseController
{
    public function render(): void
    {
        $data = ['controller' => $this->controller];
        $data = apply_filters('filter_pagecontroller_data', $data, $this->controller);
        $this->view->setData($data);
        $this->view->render('core.page');
    }
}