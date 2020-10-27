<?php
require __DIR__ . '/../vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->get('/', function() {
    echo 'index';
});

$router->get('/hello', function() {
    echo 'hello';
});

$router->get('/hello/(\w+)', function($name) {
    echo 'have a nice day ' . htmlentities($name);
});

$router->run();