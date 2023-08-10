<?php

declare(strict_types=1);


namespace App\Controllers\Core;

use App\Core\Abstracts\BaseController;

class SingleController extends BaseController
{
    public function render(): void
    {
        $data = ['controller' => $this->controller];
        $data = apply_filters('filter_singlecontroller_data', $data);
        $this->view->setData($data);
        $this->view->render('core.single');
    }
}