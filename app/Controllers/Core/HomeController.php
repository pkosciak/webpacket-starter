<?php

declare(strict_types=1);


namespace App\Controllers\Core;

use App\Core\Abstracts\BaseController;

class HomeController extends BaseController
{
    public function render(): void
    {
        $data = ['controller' => $this->controller];
        $data = apply_filters('filter_homecontroller_data', $data);
        $this->view->setData($data);
        $this->view->render('core.home');
    }
}