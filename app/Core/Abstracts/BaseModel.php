<?php

declare(strict_types=1);

namespace App\Core\Abstracts;

use App\Core\Traits\Modular;

abstract class BaseModel
{
    use Modular;

    protected ?\wpdb $wpdb = null;

    public function __construct()
    {
        global $wpdb;
        $this->setupModule();
        $this->wpdb = $wpdb;
    }

}
