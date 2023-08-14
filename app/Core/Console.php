<?php

declare(strict_types=1);

namespace App\Core;

use App\Helpers\Config;

class Console
{

    public function __construct()
    {
        add_action('cli_init', [$this,'registerNamespaces']);
    }

    /**
     * Namespaces are registered for dependency resolution
     * but executed only by wp cli
     * @since 1.0.0
     */
    public function registerNamespaces(): void
    {
        $namespacesList = Config::get('CONSOLE');

        if (empty($namespacesList)) return;

        foreach ($namespacesList as $namespaceName) {
            $fullNamespaceName = 'App\Console\\' . $namespaceName;
            if(class_exists('WP_CLI')){
                new $fullNamespaceName();
            }
        }
    }

}