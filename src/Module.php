<?php
namespace SlimEloquent;

class Module
{
    public function loadDependencies($container)
    {
        require __DIR__.'/dependencies.php';
    }
}
