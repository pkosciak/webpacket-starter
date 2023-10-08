<?php

declare(strict_types=1);

namespace App\Core\Abstracts;

use App\Core\AjaxRouter;
use App\Core\Console;
use App\Core\DuplicateFunctionalityException;
use App\Core\Interfaces\ThemeInterface;
use App\Core\View;
use App\Exceptions\Core\MissingControllerException;
use App\Core\RestRouter;
use App\Core\TemplateRouter;
use App\Exceptions\Core\DuplicateExtensionException;
use App\Exceptions\Core\DuplicateModelException;
use App\Exceptions\Core\DuplicateModuleException;
use App\Exceptions\Core\MissingDependencyException;
use App\Helpers\Config;

abstract class BaseTheme implements ThemeInterface
{
    protected View $view;

    public TemplateRouter $router;

    public static array $loaded = [];

    private static array $loadedObjects = [];

    private static AjaxRouter $ajaxRouterInstance;

    private static RestRouter $restRouterInstance;

    public function __construct()
    {
        $this->init();
        $this->view = new View();
        add_action('wp_enqueue_scripts', [$this, 'registerAssetsAction']);
        add_action('admin_enqueue_scripts', [$this, 'registerAdminAssetsAction']);
        remove_action('shutdown', 'wp_ob_end_flush_all', 1);
        add_filter('auto_update_plugin', '__return_false');
        add_filter('auto_update_theme', '__return_false');

        $this->router = new TemplateRouter();
        $this->registerControllers();
        $this->registerModules();
        $this->registerModels();
        $this->registerExtensions();
        $this::$ajaxRouterInstance = new AjaxRouter();
        $this::$restRouterInstance = new RestRouter();

        new Console();

        $this->checkDependencies();
        $this->checkAjaxDependencies();
        $this->checkRestDependencies();
    }

    public function registerControllers(): void
    {
        $controllers = Config::get('CONTROLLERS');
        if(empty($controllers)) return;

        foreach ($controllers as $controllerName)
        {
            $fullControllerName = 'App\Controllers\\' . $controllerName;
            self::$loadedObjects[$controllerName] = new $fullControllerName($this->view);

            $this->addToLoaded('controller', self::$loadedObjects[$controllerName]);
        }
    }

    public function registerModels(): void
    {
        $models = Config::get('MODELS');
        if(empty($models)) return;

        foreach ($models as $modelName)
        {
            $fullModelName = 'App\Models\\' . $modelName;
            self::$loadedObjects[$modelName] = new $fullModelName();

            $this->addToLoaded('model', self::$loadedObjects[$modelName]);
        }
    }

    public function registerModules(): void
    {
        $modules = Config::get('MODULES');
        if(empty($modules)) return;

        foreach ($modules as $moduleType => $moduleList)
        {
            foreach ($moduleList as $module)
            {
                $fullModuleNamespace = 'App\Modules\\' . $moduleType . '\\' . $module . '\\' . $module;
                self::$loadedObjects[$module] = new $fullModuleNamespace($this->view);

                $this->addToLoaded('module', self::$loadedObjects[$module]);
            }
        }
    }

    public function registerExtensions(): void
    {
        $extensions = Config::get('EXTENSIONS');
        if(empty($extensions)) return;

        foreach ($extensions as $extension)
        {
            $fullName = 'App\Extensions\\' . $extension;
            self::$loadedObjects[$extension] = new $fullName();

            $this->addToLoaded('extension', self::$loadedObjects[$extension]);
        }
    }

    private function addToLoaded($type, $class): void
    {
        $shortClassName = (new \ReflectionClass($class))->getShortName();
        if(in_array($shortClassName, self::$loaded)){
            $duplicateName = $shortClassName;
            throw new DuplicateFunctionalityException($type,$duplicateName);
        }
        self::$loaded[] = $shortClassName;
    }

    private function checkDependencies(): void
    {
        $this->handleDependenciesCheck(self::$loadedObjects);
    }

    private function handleDependenciesCheck($container): void
    {
        foreach($container as $loaded){
            $className = (new \ReflectionClass($loaded))->getShortName();
            foreach($loaded->dependencies as $dependencyType => $dependency){
                switch($dependencyType){
                    case 'plugins':
                        foreach($dependency as $pluginName => $pluginFile){
                            if(!is_plugin_active($pluginFile)){
                                throw new MissingDependencyException('Missing "' . $pluginName . '" dependency for "' . $className . '" module');
                            }
                        }
                        break;
                    default:
                        if(!in_array($dependency, self::$loaded)){
                            throw new MissingDependencyException('Missing "' . $dependency . '" dependency for "' . $className . '" module');
                        }
                        break;
                }
            }
        }
    }

    private function checkAjaxDependencies(): void
    {
        $this->handleDependenciesCheck($this::$ajaxRouterInstance->allInstances());
    }

    private function checkRestDependencies(): void
    {
        $this->handleDependenciesCheck($this::$restRouterInstance->allInstances());
    }

    public static function getLoadedObjects()
    {
        return self::$loadedObjects;
    }

    public static function getLoadedObject($name): BaseController
    {
        return self::$loadedObjects[$name] ?? throw new MissingControllerException('Missing ' . $name . ' controller');
    }

    public static function ajax(): AjaxRouter
    {
        return self::$ajaxRouterInstance;
    }

    public static function rest(): RestRouter
    {
        return self::$restRouterInstance;
    }

}
