<?php

declare(strict_types=1);

namespace App\Core;

final class TemplateRouter
{

    public function __construct()
    {
        add_action('template_redirect', [$this, 'resolve']);
    }
    public function resolve(): void
    {
        $controllerName = '';

        if($template = get_page_template()){
            $template = pathinfo(basename($template), PATHINFO_FILENAME);
            $controllerName = 'Core\TemplateController';
        } else if (is_single()) {
            $controllerName = 'Core\SingleController';
        } else if (is_page()) {
            $controllerName = 'Core\PageController';
        } else if (is_front_page()) {
            $controllerName = 'Core\FrontController';
        } else if (is_home()) {
            $controllerName = 'Core\HomeController';
        } else if (is_archive() || is_category()) {
            $controllerName = 'Core\ArchiveController';
        } else if (is_search()) {
            $controllerName = 'Core\SearchController';
        } else if (is_404()) {
            $controllerName = 'Core\ErrorController';
        }

        $controllerName = apply_filters('router_controller_name', $controllerName);

        if($controllerName){
            if($controller = Theme::getLoadedObject($controllerName)){
                $controller->render($template);
            }
        }
    }
}