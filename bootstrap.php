<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__ . "/vendor/autoload.php";


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





