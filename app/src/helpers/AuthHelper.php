<?php

class AuthHelper
{
    static public function checkLoggedIn()
    {
        session_start();
        return isset($_SESSION['USER']);
    }

    static public function saveSession($user)
    {
        session_start();
        $_SESSION['USER'] = $user;
    }
    
}