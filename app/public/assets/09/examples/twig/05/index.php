<?php

// Require composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Twig Bootstrap
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

// define our vars (fixed or via calculations)
$greeting = 'Good afternoon';
$user = array(
    'firstname' => 'Bramus',
    'lastname' => 'Van Damme',
    'city' => 'Vinkt'
);

// load template
$tpl = $twig->load('main.twig');

// render template with our data
echo $tpl->render(array(
    'greeting' => $greeting,
    'user' => $user
));

// EOF