<?php
require __DIR__ . '/../vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->get('/search', function() {
    echo '<form method="post"><input type="text" name="term"><input type="submit"></form>';
});

$router->post('/search', function() {
    $term = (isset($_POST['term'])? $_POST['term'] : '');
    header('Location: search/' . urlencode($term));
    exit();
});

$router->get('/search/(\w+)', function($term) {
    echo 'Your search term: ' . $term . '<br>';
    // Look up and show matching items in the database

});

$router->run();