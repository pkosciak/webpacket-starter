<?php

declare(strict_types=1);

namespace App\Models\Core;

use App\Core\Abstracts\BaseModel;

class AcfModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        add_filter('acf/settings/save_json', array($this, 'setAcfJsonSavePoint'));
        add_filter('acf/settings/load_json', array($this, 'setAcfJsonLoadPoint'));
    }

    /**
     * Acf will save its config at this location
     * @since 1.0.0
     */
    public function setAcfJsonSavePoint(): string
    {
        return APP_PATH . '/acf-json';
    }

    /**
     * Acf will load its config from this location
     * @since 1.0.0
     */
    public function setAcfJsonLoadPoint(array $paths): array
    {
        unset($paths[0]);
        $paths[] = APP_PATH . '/acf-json';
        return $paths;
    }

}
