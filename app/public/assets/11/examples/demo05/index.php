<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dotenv->required('BASE_PATH');

// Twig Bootstrap
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);
$function = new \Twig\TwigFunction('url', function ($path) {
    return $_ENV['BASE_PATH'] . $path;
});
$twig->addFunction($function);

$router = new \Bramus\Router\Router();

$router->get('/search', function() use ($twig) {
    echo $twig->render('search.twig' , ['term' => '', 'results' => []]);
});

$router->post('/search', function() {
    $term = (isset($_POST['term'])? $_POST['term'] : '');
    header('Location: search/' . urlencode($term));
    exit();
});

$router->get('/search/(\w+)', function($term) use ($twig) {
    // Look up and show matching items in the database
    echo $twig->render('search.twig' , ['term' => $term, 'results' => ['dummy1', 'dummy2']]);
});

$router->run();