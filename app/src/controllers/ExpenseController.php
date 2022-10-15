<?php

require_once './models/ExpenseModel.php';
require_once './models/CategoryModel.php';
require_once './views/ExpenseView.php';


class ExpenseController {

    private $model;
    private $view;


    function __construct()
    {
        $this->model = new ExpenseModel();
        $this->categoryModel = new CategoryModel();
        $this->view = new ExpenseView();
    }


    function index(){
        $expenseData = $this->model->getAll();

        
        $this->view->showAll($expenseData, false, false, '');
    }

    function show($params) {
        $expenseId = $params['pathParams'][':ID'];
        $expenseData = $this->model->get($expenseId);
        $categoryData = $this->categoryModel->get($expenseData->getCategoryId());
        
        //if (empty($expenseData))
        //    return $this->view->showNotFoundPage();

        $this->view->showOne($expenseData, $categoryData, true, null);
    }
}