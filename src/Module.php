<?php
namespace SlimEloquent;

class Module
{
    /**
     * load the dependencies for the module.
     */
    public function loadDependencies($container)
    {
        return SlimApi\Service\ConfigService::fetch(dirname(__DIR__));
    }
}
