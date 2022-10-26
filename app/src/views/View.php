<?php

require_once '../vendor/autoload.php';

class View
{
    private $loader;
    private $twig;
    protected $context;
    
    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader('./templates');
        $this->twig = new \Twig\Environment($this->loader);
        $this->context = [
            'isLogged' => AuthHelper::checkLoggedIn(),
            'currentPage' => $_SERVER['REQUEST_URI'],
        ];
    }

    public function render($template)
    {  
        echo $this->twig->load($template)->render($this->context);
    }

    public function addContext($key, $value)
    {
        $this->context += [$key => $value];
    }

    public function removeContext($key)
    {
        unset($this->context[$key]);
    }

}