<?php

declare(strict_types=1);

namespace App\Core\Interfaces;

interface ThemeInterface
{

    public function init(): void;

    public function registerAssetsAction();

    public function registerAdminAssetsAction();

    public function registerModules();

}
