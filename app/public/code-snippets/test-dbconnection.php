<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');



$user = 'root';
$pass = 'Azerty123';
$server = 'mysqldb';

$dbh = new PDO( "mysql:host=$server", $user, $pass );
$dbs = $dbh->query( 'SHOW DATABASES' );

while( ( $db = $dbs->fetchColumn( 0 ) ) !== false )
{
    echo $db.'<br>';
}

// EOF