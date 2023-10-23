<?php
require __DIR__ . '/../vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->mount('/movies', function() use ($router) {

    // will result in '/movies/'
    $router->get('/', function() {
        echo 'movies overview';
    });

    // will result in '/movies/id'
    $router->get('/(\d+)', function($id) {
        echo 'movie id ' . htmlentities($id);
    });

});

$router->run();