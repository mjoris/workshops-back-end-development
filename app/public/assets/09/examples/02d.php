<?php

    /**
     * Redirects to the error handling page
     * @param string $type
     * @param string $msg
     * @return void
     * @throws Exception
     */
    function showDbError(string $type, string $msg) : void {

		// Log it (for the developer)
		file_put_contents(__DIR__ . '/error_log_mysql', PHP_EOL . (new DateTime())->format('Y-m-d H:i:s') . ' : ' . $msg, FILE_APPEND);

		// Redirect to nice error page (for the visitor)
		header('location: error.php?type=db&detail=' . $type);
		exit();

	}

	// Include config
	require_once 'config.php';

	// Make Connection
	try {
		$db = new PDO('mysql:host=' . DB_HOST .';dbname=does_not_exist;charset=utf8mb4', DB_USER, DB_PASS);
	} catch (PDOException $e) {
		showDbError('connect', $e->getMessage());
	}

	echo 'Connected to the database';

	// ... your query magic here

//EOF