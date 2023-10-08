<?php

declare(strict_types=1);

namespace App\Core\Interfaces;

interface BlockInterface
{
    public function register() : array;

    public function renderFront($block, $content = '', $is_preview = false, $post_id = 0): void;

}
