<?php

declare(strict_types=1);


namespace App\Controllers\Core;

use App\Core\Abstracts\BaseController;

class ErrorController extends BaseController
{
    protected string $template = 'core.404';

    public function init(): void
    {
        $this->instance->setData([
            'code'       => '404',
            'heading'    => __('Page not found', THEME_TEXTDOMAIN),
            'subheading' => __('Sorry, we couldn’t find the page you’re looking for.', THEME_TEXTDOMAIN),
            'goback'     => __('Go back home', THEME_TEXTDOMAIN),
            'contact'    => __('Contact', THEME_TEXTDOMAIN)
        ]);
    }
}