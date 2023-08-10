<?php

declare(strict_types=1);

namespace App\Core\Interfaces;

use App\Core\Abstracts\BaseApiRouter;

interface ApiRouterInterface
{
    public function allInstances(): array;

    public function instance($apiName): BaseApiRouter|false;

    public function allRoutes(): array;

    public function routes($apiName): array|false;

    public function publicRoutes($apiName): array|false;

    public function privateRoutes($apiName): array|false;

}