<?php

require_once './models/ExpenseModel.php';
require_once './models/CategoryModel.php';
require_once './views/ExpenseView.php';


class ExpenseController {

    private $model;
    private $view;
    private $categoryModel;


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

    function show($params)
    {
        $expenseId = $params['pathParams'][':expenseId'];
        $expenseData = $this->model->get($expenseId);
        $categoryData = $this->categoryModel->get($expenseData->getCategoryId());
        
        //if (empty($expenseData))
        //    return $this->view->showNotFoundPage();

        $this->view->showOne($expenseData, $categoryData, true, null);
    }

    function showAllByCategory($params)
    {
        $categoryId = $params['pathParams'][':categoryId'];

        if(!$this->categoryModel->exist($categoryId))
            echo 404;

        $expenseData = $this->model->getAllByCategory($categoryId);

        
        $this->view->showAll($expenseData, false, false, '');

    }

}