<?php

// Require composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Twig Bootstrap
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

// load template
$tpl = $twig->load('main.twig');

// render template with our data
echo $tpl->render(array(
    'pageTitle' => 'Template Inheritance'
));

// EOF