<?php
namespace SlimEloquent;

use SlimApi\Service\ConfigService;

class Module
{
    /**
     * load the dependencies for the module.
     */
    public function loadDependencies($container)
    {
        return ConfigService::fetch(dirname(__DIR__));
    }
}
