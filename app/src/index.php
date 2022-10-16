<?php

error_reporting(E_ERROR | E_PARSE);

require_once 'Router.php';
require_once './controllers/HomeController.php';
require_once './controllers/ExpenseController.php';
require_once './controllers/CategoryController.php';
require_once './controllers/UserController.php';

define("BASE_URL", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . '/');
define("LOGIN", BASE_URL . "login");


$router = new Router();

$router->addRoute('', 'GET', 'HomeController', 'index');

//expense related paths
$router->addRoute('gastos', 'GET', 'ExpenseController', 'index');
$router->addRoute('gastos/:expenseId', 'GET', 'ExpenseController', 'show');
$router->addRoute('categorias/:categoryId/gastos', 'GET', 'ExpenseController', 'showAllByCategory');
$router->addRoute('gastos/add', 'POST', 'ExpenseController', 'add');
$router->addRoute('gastos/:expenseId/delete', 'GET', 'ExpenseController', 'delete');
$router->addRoute('gastos/:expenseId/update', 'POST', 'ExpenseController', 'update');
$router->addRoute('gastos/:expenseId/edit', 'GET', 'ExpenseController', 'edit');



//category related paths
$router->addRoute('categorias', 'GET', 'CategoryController', 'index');
$router->addRoute('categorias/add', 'POST', 'CategoryController', 'add');
$router->addRoute('categorias/:categoryId/delete', 'GET', 'CategoryController', 'delete');
$router->addRoute('categorias/:categoryId/edit', 'GET', 'CategoryController', 'edit');
$router->addRoute('categorias/:categoryId/update', 'POST', 'CategoryController', 'update');


$router->addRoute('signup', 'GET', 'UserController', 'index');
$router->addRoute('signin', 'GET', 'UserController', 'showSignIn');
$router->addRoute('users/add', 'POST', 'UserController', 'add');
$router->addRoute('verifyUser', 'POST', 'UserController', 'verifyUser');
$router->addRoute('signout', 'GET', 'UserController', 'signOut');

$router->setDefaultRoute('HomeController', 'showPageNotFound');

$router->route($_GET['action'], $_SERVER['REQUEST_METHOD'])



?>