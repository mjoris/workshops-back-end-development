<?php

    // Composer's autoloader
    require_once 'vendor/autoload.php';

	// Include config
	require_once 'config.php';

    $connectionParams = [
        'dbname' => DB_NAME_FF,
        'user' => DB_USER,
        'password' => DB_PASS,
        'host' => DB_HOST,
        'driver' => 'pdo_mysql',
        'charset' => 'utf8mb4'
    ];

    /* Alternatively if you prefer a DSN
    $connectionParams = [
        'url' => 'mysql://' . DB_USER . ':' . DB_PASS . '@' . DB_HOST . '/' . DB_NAME_FF
    ]; */

    // returns an instance of Doctrine\DBAL\Connection but doesn't actually connect
    $connection = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

    // connect() is for testing, and NOT required before querying
    // connect() throws a PDOException when
    // connect() returns TRUE if the connection was successfully established, FALSE if the connection is already open.
    $result = $connection->connect();
    if ($result) {
        echo 'Connection was successfully established';
    }

	// ... your query magic here

//EOF