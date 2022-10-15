<?php

require_once 'Router.php';
require_once './controllers/HomeController.php';
require_once './controllers/ExpenseController.php';

define("BASE_URL", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]));
define("LOGIN", BASE_URL . "login");


$router = new Router();

$router->addRoute('', 'GET', 'HomeController', 'index');


$router->addRoute('gastos', 'GET', 'ExpenseController', 'index');


$router->route($_GET['action'], $_SERVER['REQUEST_METHOD'])


?>