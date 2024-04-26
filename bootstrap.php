<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config/services.php";

// Create a simple "default" Doctrine ORM configuration for Annotation Mapping
$isDevMode = true;
$config = ORMSetup::createAttributeMetadataConfiguration([__DIR__."/src"], $isDevMode);

// database configuration parameters
$connection = DriverManager::getConnection([
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
], $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);

$containerBuilder = new ContainerBuilder();

$containerBuilder->set('doctrine.orm.entity_manager', $entityManager);

$loader = new PhpFileLoader($containerBuilder, new FileLocator(__DIR__));
$loader->load('config/services.php');





