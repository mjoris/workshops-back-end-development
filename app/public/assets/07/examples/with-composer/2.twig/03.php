<?php

// Require autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Twig Bootstrap
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
	'cache' => 'cache',
	'auto_reload' => true // set to false in production mode
]);

// Load in the template and display it (shorthand)
echo $twig->render('03.twig');

// EOF