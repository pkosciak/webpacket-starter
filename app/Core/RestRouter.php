<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Abstracts\BaseApiRouter;
use App\Enums\Core\ApiState;
use App\Helpers\Config;

final class RestRouter extends BaseApiRouter
{

    protected function registerRoutes(): void
    {
        $apiList = Config::get('API/Rest');

        if(empty($apiList)) return;

        foreach($apiList as $apiName){
            $fullApiName = 'App\Api\Rest\\' . $apiName;
            if($apiInstance = new $fullApiName()){
                $this->registeredApiInstances[$apiName] = $apiInstance;
                $this->registeredApiRoutes[$apiName] = ['public' => [], 'private' => []];
                $reflection = new \ReflectionClass($apiInstance::class);
                foreach ($reflection->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
                    if($attributes = $method->getAttributes()){
                        if(isset($attributes[0]) && ($attributes[0]->getName() == 'App\Core\Route')){
                            $routeInstance = $attributes[0]->newInstance();
                            if($state = $routeInstance->state){
                                switch($state){
                                    case ApiState::LOGGED_IN:
                                        if (is_user_logged_in()) {
                                            add_action('rest_api_init', [$apiInstance, $method->name]);
                                            $this->registeredApiRoutes[$apiName]['private'][] = $method->name;
                                        }
                                        break;
                                    case ApiState::LOGGED_OUT:
                                        if(!is_user_logged_in()) {
                                            add_action('rest_api_init', [$apiInstance, $method->name]);
                                            $this->registeredApiRoutes[$apiName]['private'][] = $method->name;
                                        }
                                        break;
                                    default:
                                        add_action('rest_api_init', [$apiInstance, $method->name]);
                                        $this->registeredApiRoutes[$apiName]['public'][] = $method->name;
                                        break;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

}