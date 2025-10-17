<?php

// Require composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Twig Bootstrap
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

// define our vars (fixed or via calculations)
$lecturers = array(
    ['name' => 'Pieter Van Peteghem', 'city' => 'Ghent', 'courses' => ['Back-end Development']],
    ['name' => 'Bart Delrue', 'city' => 'Ghent', 'courses' => ['Javascript Development', 'Full-stack Introduction', 'Web Frameworks']],
    ['name' => 'Peter Demeester'],
);

// load template
$tpl = $twig->load('main.twig');

// render template with our data
echo $tpl->render([
    'name' => 'Joris Maervoet',
    'colleagues' => $lecturers
]);

// EOF