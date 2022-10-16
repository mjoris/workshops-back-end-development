<?php

// Require autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Twig Bootstrap
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'cache' => 'cache',
    'auto_reload' => true // set to false in production mode
]);

// Vars
$name = 'Bramus';

// Load in the template and display it
$template = $twig->load('02.twig');
echo $template->render(array(
	'name' => $name,
	'myarray' => array(
		'JLW272' => 'WS1: Clientside Webscripten',
		'JLW274' => 'WS1: Serverside Webscripten',
		'JLW384' => 'WS2: Serverside Webscripten'
	)
));

// EOF