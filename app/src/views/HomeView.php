<?php

require_once './views/View.php';

class HomeView extends View
{

    public function showHome()
    {
        $this->render('index.twig');
    }

    public function showPageNotFound()
    {
        $this->render('error404.twig');
    }
}