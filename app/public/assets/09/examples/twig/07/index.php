<?php

// Require composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Twig Bootstrap
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

// define our vars (fixed or via calculations)
$lecturers = array(
    array('name' => 'Rogier van der Linde', 'city' => 'Ghent', 'courses' => array('Webtechnology', 'Webdesign & Usability', 'Webscripting 1', 'Webprogramming')),
    array('name' => 'Kevin Picalausa', 'city' => 'Ghent', 'courses' => array('Webscripting 2', 'Webprogramming')),
    array('name' => 'Davy De Winne', 'city' => 'Schellebelle', 'courses' => array('Webtechnology', 'Webdesign & Usability', 'Webscripting 2')),
    array('name' => 'Joske Vermeulen'),
);

// load template
$tpl = $twig->load('main.twig');

// render template with our data
echo $tpl->render(array(
    'name' => 'Bramus Van Damme',
    'colleagues' => $lecturers
));

// EOF