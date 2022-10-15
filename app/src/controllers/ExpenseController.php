<?php

require_once './models/ExpenseModel.php';
require_once './views/ExpenseView.php';


class ExpenseController {

    private $model;
    private $view;


    function __construct()
    {
        $this->model = new ExpenseModel();
        $this->view = new ExpenseView();
    }


    function index(){
        $expenseData = $this->model->getAll();

        
        $this->view->showAll($expenseData, false, false, '');
    }
}