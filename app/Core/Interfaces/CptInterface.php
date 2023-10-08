<?php

declare(strict_types=1);

namespace App\Core\Interfaces;

interface CptInterface
{
    public function init();
    public function registerCustomPostType();
}
