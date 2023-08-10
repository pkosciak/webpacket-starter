<?php

declare(strict_types=1);

namespace App\Modules\Layouts\ExampleHeaderLayout;

use App\Core\Abstracts\BaseLayout;

use App\Core\View;

class ExampleHeaderLayout extends BaseLayout
{

    public function __construct(protected View $view)
    {
        parent::__construct($this->view);
        add_action('layout_parts_header',[$this, 'renderFront']);
    }
}