<?php

declare(strict_types=1);

namespace App\Core\Abstracts;

use App\Core\Interfaces\CptInterface;
use App\Core\Traits\Modular;
use App\Exceptions\Core\CptException;

abstract class BaseCpt implements CptInterface
{
    use Modular;

    public array $dependencies = [];

    protected static string $postTypeName = '';

    public function __construct()
    {
        if(!static::$postTypeName) throw new CptException('No post type name specified');
        add_action('init', [$this, 'initPostType']);
    }

    public function initPostType(): void {}
}
