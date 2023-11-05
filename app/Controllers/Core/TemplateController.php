<?php

declare(strict_types=1);


namespace App\Controllers\Core;

use App\Core\Abstracts\BaseController;

class TemplateController extends BaseController
{
    public function render(string $template = null): void
    {
        $data = ['controller' => $this->controller];
        $data = apply_filters("filter_templatecontroller_{$template}_data", $data);
        $this->view->setData($data);
        $this->view->render($template);
    }
}