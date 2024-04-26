<?php

use App\Burger;
use Doctrine\Inflector\InflectorFactory;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return function (ContainerConfigurator $containerConfigurator) {
    $services = $containerConfigurator->services();
    $inflector = InflectorFactory::create()->build();
    foreach ([Burger::class] as $class) {
        $services->set(str_replace('\\', '.', $inflector->tableize($class)), $class)
            ->args([service('doctrine.orm.entity_manager')])
            ->tag('console.command');
    }
};