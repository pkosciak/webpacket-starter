<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Abstracts\BaseAjaxApi;
use App\Core\Abstracts\BaseApiRouter;
use App\Enums\Core\ApiState;
use App\Helpers\Config;
use JetBrains\PhpStorm\NoReturn;

final class AjaxRouter extends BaseApiRouter
{

    protected function registerRoutes(): void
    {
        $apiList = Config::get('API/Ajax');

        if(empty($apiList)) return;

        foreach($apiList as $apiName){
            $fullApiName = 'App\Api\Ajax\\' . $apiName;
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
                                            add_action('wp_ajax_' . THEME_NAME . '_' . $apiName . '_' . $method->getName(), function () use ($apiInstance) {
                                                $this->getAction($apiInstance);
                                            });
                                            $this->registeredApiRoutes[$apiName]['private'][] = $method->name;
                                        }
                                        break;
                                    case ApiState::LOGGED_OUT:
                                        if(!is_user_logged_in()) {
                                            add_action('wp_ajax_nopriv_' . THEME_NAME . '_' . $apiName . '_' . $method->getName(), function () use ($apiInstance) {
                                                $this->getAction($apiInstance);
                                            });
                                            $this->registeredApiRoutes[$apiName]['public'][] = $method->name;
                                        }
                                        break;
                                    default:
                                        add_action('wp_ajax_nopriv_' . THEME_NAME . '_' . $apiName . '_' . $method->getName(), function () use ($apiInstance) {
                                            $this->getAction($apiInstance);
                                        });
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

    #[NoReturn] private function getAction(BaseAjaxApi $apiInstance): void
    {
        $reflection = new \ReflectionClass($apiInstance::class);
        $action = $_REQUEST['action'];
        if (str_starts_with($action, 'nopriv_')) {
            $action = ltrim($action,'nopriv_' . $reflection->getShortName() . '_');
        } else {
            $action = ltrim($action, $reflection->getShortName() . '_');
        }
        if ($reflection->hasMethod($action)) {
            $response = (new $apiInstance)->{$action}($_REQUEST);
            echo json_encode($response);
            die;
        }
        header("HTTP/1.1 404 Not Found");
        die;
    }



}