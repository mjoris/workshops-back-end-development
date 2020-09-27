<?php

	error_reporting(E_ALL); // set error reporting on
    ini_set('display_errors', 'on'); // show the errors on screen

	$selection = array();
	while (count($selection) < 50000) {
		$random = mt_rand(0, 500000);
		if (! in_array($random, $selection)) { // slow look-up
			$selection[] = $random;
		}
	}
	echo ("Computed 50000 unique random numbers.");