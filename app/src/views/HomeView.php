<?php

class HomeView
{
    public function __construct()
    {
        
    }

    public function showHome($loggedIn, $admin, $errorMessage = '')
    {
        echo '<!DOCTYPE html>';
        echo '<html lang="en">';
        echo '<head>';
        echo '    <meta charset="UTF-8">';
        echo '    <meta http-equiv="X-UA-Compatible" content="IE=edge">';
        echo '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '    <title>Document</title>';
        echo '</head>';
        echo '<body>';
        echo '    <h1> Hola Mundo! </h1>';
        echo '</body>';
        echo '</html>';
    }
}