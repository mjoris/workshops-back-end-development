<?php

	/**
	 * Redirects to the error handling page
	 * @param string $type
	 * @return void
	 */
	function showDbError(string $type) : void {
		// The referrerd page will show a proper error based on the $_GET parameters
		header('location: error.php?type=db&detail=' . $type);
		exit();
	}

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
        showDbError('connect');
    }

    // ... your query magic here

    //EOF