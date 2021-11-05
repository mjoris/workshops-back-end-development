<?php
require __DIR__ . '/../vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->get('/hello/(\w+)', function($name) {
    echo 'Hello ' . htmlentities($name);
});

$router->get('/movies/(\d+)/photos/(\d+)', function($movieId, $photoId) {
    echo 'Movie #' . $movieId . ', photo #' . $photoId;
});

$router->run();