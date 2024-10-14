<?php

error_reporting(E_ALL); // set error reporting on
ini_set('display_errors', 'on'); // show the errors on screen

$x = 0;

include_once '01_nonexistent.php';
include_once '01_include.php';

echo $x;