<?php

error_reporting(E_ERROR | E_PARSE);

require_once 'Router.php';
require_once './controllers/HomeController.php';
require_once './controllers/ExpenseController.php';
require_once './controllers/CategoryController.php';

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


$router->route($_GET['action'], $_SERVER['REQUEST_METHOD'])


?>