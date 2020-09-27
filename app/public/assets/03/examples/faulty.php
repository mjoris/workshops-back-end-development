<?php

	error_reporting(E_ALL); // set error reporting on
    ini_set('display_errors', 'on'); // show the errors on screen
	
	echo $foo;
	for ($x = 0; $x < 5; x++) { // the $ is missing before the x
		echo $x;
	}