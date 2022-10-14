<?php

require_once '../vendor/autoload.php';


class HomeView
{
    public function __construct()
    {
        
    }

    public function showHome($loggedIn, $admin, $errorMessage = '')
    {

        $loader = new \Twig\Loader\FilesystemLoader('./templates');
        $twig = new \Twig\Environment($loader);

        $template = $twig->load('index.twig');

        echo $template->render(['title' => 'Gestion de gastos', 'h1' => 'Hola mundo!']);
    }
}