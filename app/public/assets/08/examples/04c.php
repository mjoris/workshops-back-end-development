<?php

    /**
     * Redirects to the error handling page
     * @param string $type
     * @param string $msg
     * @return void
     * @throws Exception
     */
    function showDbError(string $type, string $msg) : void {
        file_put_contents(__DIR__ . '/error_log_mysql', PHP_EOL . (new DateTime())->format('Y-m-d H:i:s') . ' : ' . $msg, FILE_APPEND);
        header('location: error.php?type=db&detail=' . $type);
        exit();
    }

    // Composer's autoloader
    require_once 'vendor/autoload.php';

    // Include config
    require_once 'config.php';

    $connectionParams = [
        'url' => 'mysql://' . DB_USER . ':' . DB_PASS . '@' . DB_HOST . '/' . DB_NAME_FF
    ];

    $connection = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

    try {
        $connection->connect();
    } catch (\Doctrine\DBAL\Exception\ConnectionException $e) {
        showDbError('connect', $e->getMessage());
    }

	// Get ID from URL
	$id = isset($_GET['id']) ? $_GET['id'] : '0';

	// Get collection from DB
	$stmt = $connection->prepare('SELECT * FROM collections WHERE id = :id');
	$stmt->bindValue(':id', $id, 'integer');
    $result = $stmt->executeQuery();

	// Handle result here ....
	echo('Nothing to see here, check the source');

//EOF