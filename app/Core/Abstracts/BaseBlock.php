<?php

declare(strict_types=1);

namespace App\Core\Abstracts;

use App\Core\Interfaces\BlockInterface;
use App\Core\Traits\Modular;
use App\Core\View;

abstract class BaseBlock implements BlockInterface
{
    use Modular;

    public function __construct(protected View $view)
    {
        $this->setupModule();
        add_action('init', [$this, 'initBlock']);
        $this->init();
    }

    public function initBlock(): void
    {
        $args = $this->register();
        $args['render_callback'] = [$this, 'renderFront'];
        acf_register_block_type($args);
    }

    public function renderFront($block, $content = '', $is_preview = false, $post_id = 0): void
    {
        $data = ['block' => $this->name, 'instance' => $block, 'content' => $content, 'is_preview' => $is_preview, 'post_id' => $post_id];
        $data = apply_filters('filter_'.$this->name.'_data', $data);
        $this->view->setData($data);
        $this->view->render('modules.blocks.' . $this->name . '.' . $this->name);
    }

}
