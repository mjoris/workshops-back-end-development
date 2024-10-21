<?php


function showDbError(string $type, string $msg): void
{
    file_put_contents(__DIR__ . '/error_log_mysql', PHP_EOL . (new DateTime())->format('Y-m-d H:i:s') . ' : ' . $msg, FILE_APPEND);
    header('location: error.php?type=db&detail=' . $type);
    exit();
}

function getConnection(): \Doctrine\DBAL\Connection
{

    $connectionParams = [
        'dbname' => $_ENV['DB_NAME_FF'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASS'],
        'host' => $_ENV['DB_HOST'],
        'driver' => 'pdo_mysql',
        'charset' => 'utf8mb4'
    ];

    // returns an instance of Doctrine\DBAL\Connection but doesn't actually connect
    $connection = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

    // there is no method to verify the connection
    // let's ask the MySQL version number ...
    try {
        $version = $connection->getServerVersion();
    } catch (\Doctrine\DBAL\Exception\ConnectionException $e) {
        showDbError('connect', $e->getMessage());
    }

    return $connection;
}
