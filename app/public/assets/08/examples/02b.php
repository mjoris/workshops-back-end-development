<?php

    // Composer's autoloader
    require_once 'vendor/autoload.php';

    // Include config
    require_once 'config.php';

    $connectionParams = [
        'url' => 'mysql://' . DB_USER . ':' . DB_PASS . '@' . DB_HOST . '/' . 'does_not_exist'
    ];

    $connection = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

    try {
        $connection->connect();
    } catch (\Doctrine\DBAL\Exception\ConnectionException $e) {
        exit('Could not connect to database server or access database');
    }

    // ... your query magic here

    //EOF