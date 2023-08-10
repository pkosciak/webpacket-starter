<?php

declare(strict_types=1);

namespace App\Core;

use App\Helpers\Config;

class Cli
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
        $namespacesList = Config::get('COMMANDS');

        if (empty($namespacesList)) return;

        foreach ($namespacesList as $namespaceName) {
            $fullNamespaceName = 'App\Commands\\' . $namespaceName;
            if(class_exists('WP_CLI')){
                new $fullNamespaceName();
            }
        }
    }

}