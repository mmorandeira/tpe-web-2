<?php

class CategoryView
{
    private $loader;
    private $twig;

    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader('./templates');
        $this->twig = new \Twig\Environment($this->loader);
    }

    public function showAll($categories, $loggedIn, $admin, $errorMessage = '')
    {
        $template = $this->twig->load('categories.twig');

        echo $template->render(['title' => 'Gestion de gastos', 'h1' => 'Hola mundo!', 'categories' => $categories]);
    }

    public function showEdit($category, $loggedIn, $admin)
    {
        $template = $this->twig->load('category-edit.twig');

        echo $template->render(['title' => 'Gestion de gastos', 'h1' => 'Hola mundo!', 'category' => $category]);
    }
}