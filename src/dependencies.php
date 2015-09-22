<?php
$container['eloquentModelTemplate'] = function($container) {
    return file_get_contents(realpath(__DIR__.'/../templates').'/ModelTemplate.txt');
};

$container['SlimApi\Model\ModelInterface'] = function($container) {
    return new \SlimEloquent\Model\EloquentModelService($container->get('eloquentModelTemplate'), $container->get('namespace'));
};
