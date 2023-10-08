<?php

declare(strict_types=1);

namespace App\Core\Traits;

trait Modular
{
    public string $name;

    public string $version;

    public array $dependencies = [];

    public function setupModule(): void
    {
        $this->name = (new \ReflectionClass(static::class))->getShortName();
    }

}