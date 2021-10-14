<?php

// Require composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Twig Bootstrap
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

// define our vars (fixed or via calculations)
$courses = array(
    'JPW235' => 'Webscripting1',
    'JPW213' => 'Webscripting2',
    'JPW218' => 'Web & Mobile',
);

// load template
$tpl = $twig->load('main.twig');

// render template with our data
echo $tpl->render(array(
    'courses' => $courses
));

// EOF