<?php

declare(strict_types=1);

namespace App\Modules\Cpt\ExampleCpt;

use App\Core\Abstracts\BaseCpt;

class ExampleCpt extends BaseCpt
{

    protected static string $postTypeName = 'example';

    public function registerCustomPostType(): void
    {
        $labels = [
            'name'               => _x('Name', 'post type general name', THEME_TEXTDOMAIN),
            'singular_name'      => _x('Singular name', 'post type singular name', THEME_TEXTDOMAIN),
            'menu_name'          => _x('Menu name', 'admin menu', THEME_TEXTDOMAIN),
            'name_admin_bar'     => _x('Name admin bar', 'add new on admin bar', THEME_TEXTDOMAIN),
            'add_new'            => _x('Add new', 'add new', THEME_TEXTDOMAIN),
            'add_new_item'       => __('Add new item', THEME_TEXTDOMAIN),
            'new_item'           => __('New item', THEME_TEXTDOMAIN),
            'edit_item'          => __('Edit item', THEME_TEXTDOMAIN),
            'view_item'          => __('View item', THEME_TEXTDOMAIN),
            'all_items'          => __('All eitems', THEME_TEXTDOMAIN),
            'search_items'       => __('Search items', THEME_TEXTDOMAIN),
            'parent_item_colon'  => __('Parent item colon:', THEME_TEXTDOMAIN),
            'not_found'          => __('Not found', THEME_TEXTDOMAIN),
            'not_found_in_trash' => __('Not found in trash', THEME_TEXTDOMAIN)
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'capability_type'    => static::$postTypeName,
            'map_meta_cap'       => false,
            'has_archive'        => false,
            'rewrite'            => [
                'slug'           => static::$postTypeName
            ],
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-businessman',
            'supports'           => ['title'],
        ];

        register_post_type(static::$postTypeName, $args);
    }


}
