<?php

declare(strict_types=1);

namespace App\Modules\Blocks\ExampleHeroSection;

use App\Core\Abstracts\BaseBlock;

/**
 * See app/templates/modules/blocks/exampleherosection/exampleherosection.blade.php
 */
class ExampleHeroSection extends BaseBlock
{
    public function init(): void
    {
        add_filter('filter_'.$this->name.'_data', [$this, 'prepareData'],10 ,1);
    }

    /**
     * Helpful links:
     * https://www.advancedcustomfields.com/resources/acf_register_block_type/
     * https://developer.wordpress.org/resource/dashicons/
     */
    public function register(): array
    {
        return array(
            'name'              => $this->name,
            'title'             => __('Simple centered hero section', THEME_TEXTDOMAIN),
            'description'       => __('Example block for webpacket starter theme', THEME_TEXTDOMAIN),
            'category'          => THEME_NAME,
            'icon'              => 'align-wide'
        );
    }

    public function prepareData($data){
        $data['heading'] = get_field('heading') ?: '';
        $data['faq'] = get_field('faq') ?: [];
        return $data;
    }
}
