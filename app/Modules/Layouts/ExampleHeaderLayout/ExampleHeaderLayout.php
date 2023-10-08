<?php

declare(strict_types=1);

namespace App\Modules\Layouts\ExampleHeaderLayout;

use App\Core\Abstracts\BaseLayout;

class ExampleHeaderLayout extends BaseLayout
{

    public function init(): void
    {
        add_action('layout_parts_header',[$this, 'renderFront']);
    }
}