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
$name = 'Bramus <script>alert("XSS Attempt");</script>';
$colleagues = array(
	array('firstname' => 'Davy', 'lastname' => 'De Winne', 'courses' => array('Webdesign & Usability', 'Web & Mobile')),
	array('firstname' => 'Kevin', 'lastname' => 'Picalausa', 'courses' => array('Webprogramming')),
	array('firstname' => 'Joske', 'lastname' => 'Vermeulen'),
);

// Load the template and display it
$template = $twig->load('01.twig');
echo $template->render(array(
	'name' => $name,
	'colleagues' => $colleagues
));

// EOF