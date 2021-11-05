<?php

	/*
	 * Database Server Config
	 */

    // specify an IP address, localhost or a computer name here
    // mysqldb is the computer name of the mysqldb container inside the Docker network
    define('DB_HOST', 'mysqldb');
    define('DB_USER', 'root');
    define('DB_PASS', 'Azerty123');

	/*
	 * Used databases
	 */

    define('DB_NAME_FF', 'fotofactory');
    define('DB_NAME_STATUS', 'status');

//EOF