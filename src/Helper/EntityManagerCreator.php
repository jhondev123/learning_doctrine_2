<?php

namespace Alura\Doctrine\Helper;

use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Cache\Adapter\PhpFilesAdapter;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__ . "/.."],
            true
        );
        $config->setMiddlewares([
            new Middleware(new ConsoleLogger(new ConsoleOutput(ConsoleOutput::VERBOSITY_DEBUG)))
        ]);
        $config->setMetadataCache(
            new PhpFilesAdapter(
                directory:__DIR__ . '/../../var/cache',
                namespace: 'metadata_cache',
            ),
        );
        $config->setQueryCache(
            new PhpFilesAdapter(
                directory:__DIR__ . '/../../var/cache',
                namespace: 'query_cache',
            ),
        );
        $config->setResultCache(
            new PhpFilesAdapter(
                directory:__DIR__ . '/../../var/cache',
                namespace: 'result_cache',
            ),
        );

        $conn = [
            'dbname' => 'learning_doctrine',
            'user' => 'user',
            'password' => 'password',
            'host' => '127.0.0.1',
            'driver' => 'pdo_mysql',
        ];

        return EntityManager::create($conn, $config);
    }
}
