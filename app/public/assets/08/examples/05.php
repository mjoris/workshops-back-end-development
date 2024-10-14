<?php

/**
 * Redirects to the error handling page
 * @param string $type
 * @return void
 */
function showDbError(string $type): void
{
    // The referred page will show a proper error based on the $_GET parameters
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
    'dbname' => $_ENV['DB_NAME_FF'],
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
    showDbError('connect');
}

// Get collection from DB
$stmt = $connection->prepare('SELECT * FROM collections WHERE user_id = ? OR name = ?');
$stmt->bindValue(1, 2, 'integer');
$stmt->bindValue(2, 'russia', 'string');
$result = $stmt->executeQuery();
$collections = $result->fetchAllAssociative();

echo '<meta charset="UTF-8" />';
echo '<pre>';
var_dump($collections);
echo '</pre>';
