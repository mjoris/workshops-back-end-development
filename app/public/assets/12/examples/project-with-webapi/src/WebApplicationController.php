<?php


class WebApplicationController
{
    protected \Twig\Environment $twig;

    public function __construct()
    {
        // bootstrap Twig
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
        $this->twig = new \Twig\Environment($loader);
    }

    public function demo()
    {
        echo $this->twig->render('demo.twig' , []);
    }

}