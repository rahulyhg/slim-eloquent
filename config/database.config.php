<?php
$config = [];
$config['eloquentModelTemplate'] = function($container) {
    return file_get_contents(realpath(__DIR__.'/../templates').'/ModelTemplate.txt');
};

$config['SlimApi\Model\ModelInterface'] = function($container) {
    return new \SlimApi\Eloquent\Model\EloquentModelService($container->get('eloquentModelTemplate'), $container->get('namespace'));
};

$config['database.configForEloquent'] = function($container) {
    $standardisedConfig    = $container['database.config'];
    $eloquentConfig = [
        'driver'    => $standardisedConfig['adapter'],
        'host'      => $standardisedConfig['host'],
        'database'  => $standardisedConfig['name'],
        'username'  => $standardisedConfig['user'],
        'password'  => $standardisedConfig['pass'],
        'charset'   => $standardisedConfig['charset'],
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ];

    return $eloquentConfig;
};

$config['database.connectEloquent'] = function($container) {
    $config  = $container['database.configForEloquent'];
    $manager = new \Illuminate\Database\Capsule\Manager;
    $manager->addConnection($config);
    // Set the event dispatcher used by Eloquent models... (optional)
    $manager->setEventDispatcher(new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container));
    // Make this Capsule instance available globally via static methods... (optional)
    $manager->setAsGlobal();
    // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
    $manager->bootEloquent();

    return $manager;
};

$config['SlimApi\Eloquent\Init'] = function($container) {
    $container['database.connectEloquent'];
};

return $config;
