<?php

use App\Core\ExceptionHandler;
use App\Core\Theme;

define('THEME_ROOT', __DIR__);
define('APP_PATH', THEME_ROOT . '/app');
define('TEMPLATES_PATH', APP_PATH . '/templates');
define('CACHE_PATH', APP_PATH . '/cache');

try{
    if (defined('WP_CLI') || version_compare(PHP_VERSION, '8.1', '>=')) {
        require_once(ABSPATH . 'wp-admin/includes/plugin.php');

        if (!is_plugin_active('advanced-custom-fields-pro/acf.php')) {
            if (!is_admin()) throw new Exception('This theme require Advanced Custom Fields Pro plugin');
        } else {
            require get_theme_file_path() . '/vendor/autoload.php';

            if (!file_exists(THEME_ROOT . '/.env')) {
                if (!is_admin()) throw new Exception('This theme require .env file inside ' . get_theme_file_path());
            } else {
                $dotenv = Dotenv\Dotenv::createImmutable(THEME_ROOT);
                $dotenv->load();

                $app = new Theme();
            }
        }
    } else {
        throw new Exception('This theme require php version >= 8.1');
    }
} catch(\Throwable $e){
    throw new Exception($e);
//    ExceptionHandler::handleException($e);
}
