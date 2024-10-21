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
        'url' => 'mysql://' . DB_USER . ':' . DB_PASS . '@' . DB_HOST . '/' . DB_NAME_FF
    ];

    $connection = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

    try {
        $connection->connect();
    } catch (\Doctrine\DBAL\Exception\ConnectionException $e) {
        showDbError('connect', $e->getMessage());
    }
    return $connection;
}
