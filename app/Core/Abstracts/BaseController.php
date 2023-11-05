<?php

declare(strict_types=1);

namespace App\Core\Abstracts;

use App\Core\Interfaces\ControllerInterface;
use App\Core\Traits\Modular;
use App\Core\View;

abstract class BaseController implements ControllerInterface
{
    use Modular;

    private array $data = [];

    protected self $instance;

    protected string $controller;

    protected string $template;

    public function __construct(protected View $view)
    {
        $this->setupModule();
        $this->controller = static::class;
        $this->instance = $this;
        $this->init();
    }

    public function init(): void {}

    protected function setData(array $data): void
    {
        $this->data = array_merge($this->data, $data);
    }

    public function render(string $template = null): void
    {
        $this->data['controller'] =  $this->controller;
        $data = apply_filters('filter_'.$this->name.'_data', $this->data);
        $this->view->setData($data);
        $this->view->render($this->template);
    }
}
