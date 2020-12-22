<?php

require __DIR__ . '/vendor/autoload.php';
$router = new \Bramus\Router\Router();

$router->get('/', 'WebApplicationController@demo');

$router->mount('/api', function() use ($router) {

    $router->match('GET|POST', '/lecturers', 'LecturerController@dispatch');
    $router->match('GET|PUT|PATCH|DELETE', '/lecturers/(\d+)', 'LecturerController@dispatch');

    $router->match('GET|POST', '/products', 'ProductController@dispatch');
    $router->match('GET|PUT|PATCH|DELETE', '/products/(\d+)', 'ProductController@dispatch');


});

$router->run();