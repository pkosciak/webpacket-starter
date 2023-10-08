<?php

declare(strict_types=1);

namespace App\Core;

use RyanChandler\Blade\Blade;
use App\Exceptions\Core\ViewNotFoundException;

final class View
{
    private array $data = [];
    private Blade $blade;

    public function __construct()
    {
        $this->blade = new Blade(TEMPLATES_PATH, CACHE_PATH);
    }

    public function setData($data): void
    {
        $this->data = $data;
    }

    public function render(string $template): void
    {
        try {
            $html = $this->blade->make($template, $this->data)->render();
            echo $html;
        } catch(\InvalidArgumentException){
            throw new ViewNotFoundException(__("View '{$template}' not found",THEME_TEXTDOMAIN));
        }

    }

}