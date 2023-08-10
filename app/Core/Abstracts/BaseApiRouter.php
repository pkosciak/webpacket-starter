<?php

declare(strict_types=1);

namespace App\Core\Abstracts;

use App\Core\Interfaces\ApiRouterInterface;
use App\Core\Traits\Modular;

abstract class BaseApiRouter implements ApiRouterInterface
{
    use Modular;

    protected array $registeredApiInstances = [];
    protected array $registeredApiRoutes = [];

    public function __construct()
    {
        $this->registerRoutes();
    }

    protected function registerRoutes(): void {}

    public function allInstances(): array
    {
        return $this->registeredApiInstances;
    }

    public function instance($apiName): BaseApiRouter|false
    {
        if(array_key_exists($apiName, $this->registeredApiInstances)){
            return $this->registeredApiInstances[$apiName];
        }
        return false;
    }

    public function allRoutes(): array
    {
        return $this->registeredApiRoutes;
    }

    public function routes($apiName): array|false
    {
        if(array_key_exists($apiName, $this->registeredApiRoutes)){
            return $this->registeredApiRoutes[$apiName];
        }
        return false;
    }

    public function publicRoutes($apiName): array|false
    {
        if(array_key_exists($apiName, $this->registeredApiRoutes)){
            return $this->registeredApiRoutes[$apiName]['public'];
        }
        return false;
    }

    public function privateRoutes($apiName): array|false
    {
        if(array_key_exists($apiName, $this->registeredApiRoutes)){
            return $this->registeredApiRoutes[$apiName]['private'];
        }
        return false;
    }

}
