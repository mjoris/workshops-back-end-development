<?php

require __DIR__ . '/vendor/autoload.php';
$router = new \Bramus\Router\Router();

$router->get('/', 'WebApplicationController@demo');

$router->mount('/api', function() use ($router) {

    $router->get('/lecturers', 'LecturerController@overview');
    $router->post('/lecturers', 'LecturerController@methodNotAllowed');
    $router->get('/lecturers/(\d+)', 'LecturerController@get');

    $router->get('/products', 'ProductController@overview');
    $router->post('/products', 'ProductController@post');
    $router->get('/products/(\d+)', 'ProductController@get');
    $router->put('/products/(\d+)', 'ProductController@methodNotAllowed');
    $router->patch('/products/(\d+)', 'ProductController@methodNotAllowed');
    $router->delete('/products/(\d+)', 'ProductController@methodNotAllowed');

});

$router->run();