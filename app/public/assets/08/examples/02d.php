<?php

/**
 * Redirects to the error handling page
 * @param string $type
 * @param string $msg
 * @return void
 * @throws Exception
 */
function showDbError(string $type, string $msg): void
{
    // Log it (for the developer)
    file_put_contents(__DIR__ . '/error_log_mysql', PHP_EOL . (new DateTime())->format('Y-m-d H:i:s') . ' : ' . $msg, FILE_APPEND);

    // Redirect to nice error page (for the visitor)
    header('location: error.php?type=db&detail=' . $type);
    exit();
}


// Composer's autoloader
require_once 'vendor/autoload.php';

use Dotenv\Dotenv;
use Doctrine\DBAL\DriverManager;

// Load .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME_FF', 'DB_USER', 'DB_PASS']);

$connectionParams = [
    'dbname' => 'does_not_exist',
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => 'pdo_mysql',
    'charset' => 'utf8mb4'
];

// returns an instance of Doctrine\DBAL\Connection but doesn't actually connect
$connection = DriverManager::getConnection($connectionParams);

// there is no method to verify the connection
// let's ask the MySQL version number ...
try {
    $version = $connection->getServerVersion();
} catch (Doctrine\DBAL\Exception\ConnectionException $e) {
    showDbError('connect', $e->getMessage());
}

// ... your query magic here