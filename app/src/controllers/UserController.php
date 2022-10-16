<?php

require_once './views/UserView.php';
require_once './models/User.php';
require_once './models/UserModel.php';
require_once './models/hydrator/concrete/ClassMethodsHydrator.php';
require_once './models/hydrator/strategy/PasswordStrategy.php';
require_once './helpers/AuthHelper.php';

class UserController
{
    private $model;
    private $view;
    private $hydrator;

    function __construct()
    {
        $this->model = new UserModel();
        $this->view = new UserView();
        $this->hydrator = new ClassMethodsHydrator();
        $this->hydrator->addStrategy('password', new PasswordStrategy());
    }

    function index()
    {
        $this->view->showSignUp();
    }

    function add()
    {
        $user = $this->hydrator->hydrate($_POST, new User());

        $this->model->add($user);
        header("Location: " . BASE_URL . "");
    }
    
    function showSignIn()
    {
        $this->view->showSignIn();
    }

    function signOut()
    {
        session_start();
        session_destroy();
        header("Location:" . BASE_URL . "");
    }

    function verifyUser()
    {

        $user = $this->model->getByEmail($_POST['email']);

        if(!empty($user) && password_verify($_POST['password'], $user->getPassword())) {
            AuthHelper::saveSession($user);
            header("Location: " . BASE_URL . "");
        }

    }

}