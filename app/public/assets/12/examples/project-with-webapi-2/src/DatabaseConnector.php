<?php


class DatabaseConnector
{
    const DB_HOST = 'mysqldb';
    const DB_USER = 'root';
    const DB_PASS = 'Azerty123';
    const DB_NAME = 'demo-webapi';
    
    static function getConnection() : \Doctrine\DBAL\Connection {
        $connectionParams = [
            'url' => 'mysql://' . self::DB_USER . ':' . self::DB_PASS . '@' . self::DB_HOST . '/' . self::DB_NAME
        ];

        $connection = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

        try {
            $connection->connect();
        } catch (\Doctrine\DBAL\Exception\ConnectionException $e) {
            echo($e->getMessage());
            exit();
        }
        return $connection;
    }
}