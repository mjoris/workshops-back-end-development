<?php
require __DIR__ . '/../vendor/autoload.php';


$router = new \Bramus\Router\Router();

$router->get('/search', 'SearchController@show');

$router->post('/search', function() {
    $term = (isset($_POST['term'])? $_POST['term'] : '');
    header('Location: search/' . urlencode($term));
    exit();
});

$router->get('/search/(\w+)', 'SearchController@showResults');

$router->run();