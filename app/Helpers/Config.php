<?php

declare(strict_types=1);

namespace App\Helpers;

class Config
{

    private static mixed $pointer;
    private static array $_config = [];

    /**
     * Separate parts of config with /
     * If no location provided; full configuration will be returned
     * @example App\Helpers\Config::get('MODULES/Cpt')
     * @since 1.0.0
     */
    public static function get(?string $location = null): mixed
    {
        if (empty(self::$_config)) {
            self::$_config = require_once APP_PATH . '/config.php';
        }

        self::$pointer = self::$_config;

        if($location){
            $coords = explode('/',$location);
            foreach($coords  as $coord){
                self::$pointer = (array_key_exists($coord, self::$pointer) ? self::$pointer[$coord] : null);
                if(!self::$pointer){
                    return self::$pointer;
                }
            }
        }
        return self::$pointer;
    }

}