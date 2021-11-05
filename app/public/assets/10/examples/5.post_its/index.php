<?php

require __DIR__ . '/vendor/autoload.php';
$router = new \Bramus\Router\Router();

$router->before('GET|POST', '/.*', function () {
    session_start();
});

$router->get('/', 'PostItController@showAllMessages');

$router->mount('/dashboard', function() use ($router) {

    $router->get('/', function() {
        header('Location: dashboard/messages');
        exit();
    });

    $router->get('/login', 'AuthController@showLogin');
    $router->post('/login', 'AuthController@login');
    $router->post('/logout', 'AuthController@logout');

    $router->before('GET|POST', '/messages.*', function () {
        if (! isset($_SESSION['user'])) {
            header('Location: /assets/11/examples/5.post_its/dashboard/login');
            exit();
        }
    });

    $router->get('/messages', 'PostItController@showPersonalMessages');
    $router->get('/messages/add', 'PostItController@showAdd');
    $router->post('/messages/add', 'PostItController@add');
    $router->get('/messages/(\d+)/delete', 'PostItController@showDelete');
    $router->post('/messages/(\d+)/delete', 'PostItController@delete');

});

$router->run();