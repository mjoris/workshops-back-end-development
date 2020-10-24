<?php

    // Composer's autoloader
    require_once 'vendor/autoload.php';

    // Include config
    require_once 'config.php';

    $connectionParams = [
        'url' => 'mysql://' . DB_USER . ':' . DB_PASS . '@' . DB_HOST . '/' . 'does_not_exist'
    ];

    $connection = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

    $result = $connection->connect();
    if ($result) {
        echo 'Connection was successfully established';
    }

    // ... your query magic here

    //EOF