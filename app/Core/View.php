<?php

declare(strict_types=1);

namespace App\Core;

use RyanChandler\Blade\Blade;
use App\Exceptions\Core\ViewNotFoundException;

final class View
{
    private $data = [];
    private $blade;

    public function __construct()
    {
        $this->blade = new Blade(TEMPLATES_PATH, CACHE_PATH);
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function render(string $template) {
        try {
            $html = $this->blade->make($template, $this->data)->render();
            echo $html;
        } catch(\InvalidArgumentException){
            throw new ViewNotFoundException(__("View '{$template}' not found",THEME_TEXTDOMAIN));
        }

    }

}