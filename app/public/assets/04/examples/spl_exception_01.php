<?php
error_reporting(E_ALL); // set error reporting on
ini_set('display_errors', 'on'); // show the errors on screen

$di = new DirectoryIterator('/this/path/does/not/exist');

// EOF