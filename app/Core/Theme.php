<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Abstracts\BaseTheme;

class Theme extends BaseTheme
{
    public function init(): void
    {
        $theme_data = wp_get_theme();
        define('THEME_TEXTDOMAIN', $theme_data->get('TextDomain'));
        define('THEME_NAME', $theme_data->get('Name'));
    }

    public function registerAdminAssetsAction(): void
    {
        wp_enqueue_style(THEME_NAME . '_admin_styles', get_stylesheet_directory_uri() . '/public/css/backend'.(($_ENV['ENV_TYPE'] == "production")?'.min':'').'.css');
    }
    public function registerAssetsAction(): void
    {
        wp_enqueue_script(THEME_NAME . '_scripts',  get_stylesheet_directory_uri() . '/public/js/frontend'.(($_ENV['ENV_TYPE'] == "production")?'.min':'').'.js', false, false, true);
        wp_enqueue_style(THEME_NAME . '_styles',  get_stylesheet_directory_uri() . '/public/css/frontend'.(($_ENV['ENV_TYPE'] == "production")?'.min':'').'.css');
        wp_localize_script( THEME_NAME . '_scripts', 'wp', ['ajax_url' => get_stylesheet_directory_uri() . '/ajax.php']);
    }

}
