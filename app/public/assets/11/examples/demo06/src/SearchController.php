<?php

class SearchController
{
    protected \Doctrine\DBAL\Connection $db;
    protected \Twig\Environment $twig;

    public function __construct()
    {
        // load .env
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();
        $dotenv->required('BASE_PATH');

        // initiate DB connection

        // bootstrap Twig
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
        $this->twig = new \Twig\Environment($loader);
        $function = new \Twig\TwigFunction('url', function ($path) {
            return $_ENV['BASE_PATH'] . $path;
        });
        $this->twig->addFunction($function);
    }

    public function show(): void
    {
        echo $this->twig->render('search.twig', ['term' => '', 'results' => []]);
    }

    public function showResults(string $term): void
    {
        echo $this->twig->render('search.twig', ['term' => $term, 'results' => ['dummy1', 'dummy2']]);
    }
}