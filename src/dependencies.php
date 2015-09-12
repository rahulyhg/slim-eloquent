<?php
$container['model.structure'] = function($container) {
    return realpath(__DIR__.'/../templates').'/ModelTemplate.txt';
};

$container['SlimApi\Model\ModelInterface'] = function($container) {
    return new \SlimEloquent\Model\EloquentModelService($container->get('model.structure'), $container->get('namespace.root'));
};
