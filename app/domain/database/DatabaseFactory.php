<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DatabaseFactory {

    private const PATH_TO_DB_ENTITIES = "app/domain/entities";

    private const DB_PARAMS = "app/core/config/db_params.php";

    private const CHARSET_DB_STRINGS = "SET NAMES UTF8";

    public static function getEntityManager() : EntityManager {
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $config = Setup::createAnnotationMetadataConfiguration(array(self::PATH_TO_DB_ENTITIES), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

        // database configuration parameters
        $connection = include(self::DB_PARAMS);

        // obtaining the entity manager
        $entityManager = EntityManager::create($connection, $config);

        $conn = $entityManager->getConnection();
        $conn->executeQuery(self::CHARSET_DB_STRINGS);
        $conn->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

        return $entityManager;
    }
}