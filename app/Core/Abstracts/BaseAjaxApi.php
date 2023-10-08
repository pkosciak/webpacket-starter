<?php

declare(strict_types=1);

namespace App\Core\Abstracts;

use App\Core\Interfaces\ApiInterface;
use App\Core\Traits\Modular;

abstract class BaseAjaxApi implements ApiInterface
{
    use Modular;
    public function __construct(){
        $this->setupModule();
    }

    public function init(): void {}
}
