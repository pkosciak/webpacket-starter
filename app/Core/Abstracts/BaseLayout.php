<?php

declare(strict_types=1);

namespace App\Core\Abstracts;

use App\Core\Interfaces\LayoutInterface;
use App\Core\Traits\Modular;
use App\Core\View;

abstract class BaseLayout implements LayoutInterface {
    use Modular;

    protected string $name;

    public function __construct(protected View $view)
    {
        $this->name = (new \ReflectionClass(static::class))->getShortName();
    }

    public function renderFront(): void
    {
        $data = ['layout' => $this->name];
        $data = apply_filters('filter_'.$this->name.'_data', $data);
        $this->view->setData($data);
        $this->view->render('modules.layouts.'.$this->name.'.'.$this->name);
    }

}
