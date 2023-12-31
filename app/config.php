<?php

declare(strict_types=1);

/**
 * For extracting config values use App\Helpers\Config::get
 * separate parts of config with /
 * @example App\Helpers\Config::get('MODULES/Cpt')
 * @since 1.0.0
 */
return [
    'CONTROLLERS' => [
        'Core\TemplateController',
        'Core\ArchiveController',
        'Core\ErrorController',
        'Core\FrontController',
        'Core\HomeController',
        'Core\PageController',
        'Core\SearchController',
        'Core\SingleController',
    ],
    'MODELS' => [
        'Core\AcfModel',
        'ArticlesModel',
    ],
    'MODULES' => [
        'Cpt' => [
            'ExampleCpt',
        ],
        'Blocks' => [
            'ExampleHeroSection'
        ],
        'Layouts' => [
            'ExampleHeaderLayout'
        ],
    ],
    'EXTENSIONS' => [],
    'API' => [
        'Ajax' => [
            'SearchApi'
        ],
        'Rest' => [
            'SearchApi'
        ],
    ],
    'CONSOLE' => [
        'Core\Starter'
    ],
];