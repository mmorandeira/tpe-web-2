<?php

require_once './views/View.php';

class UserView extends View
{

    public function showSignUp()
    {
        $this->addContext('action', 'users/add');
        $this->addContext('submitLabel', 'Registrarse');
        $this->render('form.twig');
    }

    function showSignIn()
    {
        $this->addContext('action', 'verifyUser');
        $this->addContext('submitLabel', 'Iniciar sesion');
        $this->render('form.twig');
    }
}