<?php

require 'vendor/autoload.php';

use Alura\Doctrine\Helper\EntityManagerCreator;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\DBAL\DriverManager;

$config = new PhpFile(__DIR__ .'/migrations.php');

$paths = [__DIR__.'/lib/MyProject/Entities'];
$isDevMode = true;

$entityManager = EntityManagerCreator::createEntityManager();

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));
