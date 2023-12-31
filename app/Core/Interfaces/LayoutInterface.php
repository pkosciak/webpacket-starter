<?php

declare(strict_types=1);

namespace App\Core\Interfaces;

interface LayoutInterface
{
    public function init(): void;
    public function renderFront(): void;
}
