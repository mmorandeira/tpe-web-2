<?php

require_once './models/ExpenseModel.php';
require_once './models/CategoryModel.php';
require_once './views/ExpenseView.php';
require_once './models/hydrator/concrete/ClassMethodsHydrator.php';
require_once './models/hydrator/strategy/DateStrategy.php';

class ExpenseController {

    private $model;
    private $view;
    private $categoryModel;
    private $hydrator;


    function __construct()
    {
        $this->model = new ExpenseModel();
        $this->categoryModel = new CategoryModel();
        $this->view = new ExpenseView();
        $this->hydrator = new ClassMethodsHydrator();
        $this->hydrator->addStrategy('date', new DateStrategy());
    }


    function index(){
        $expenseData = $this->model->getAll();
        $categoryData = $this->categoryModel->getAll();
        
        $this->view->showAll($expenseData, $categoryData, false, false, '');
    }

    function show($params)
    {
        $expenseId = $params['pathParams'][':expenseId'];
        $expenseData = $this->model->get($expenseId);
        if($expenseData){
            $categoryData = $this->categoryModel->get($expenseData->getCategoryId());

            //if (empty($expenseData))
            //    return $this->view->showPageNotFound();

            $this->view->showOne($expenseData, $categoryData, true, null);
        }
    }

    function showAllByCategory($params)
    {
        $categoryId = $params['pathParams'][':categoryId'];

        $category = null;
        if(!$this->categoryModel->exist($categoryId)) {
            echo 404;
        } else {
            $category = $this->categoryModel->get($categoryId);
        }
        $categories = $this->categoryModel->getAll();

        $expenseData = $this->model->getAllByCategory($categoryId);

        
        $this->view->showAllOfCategory($expenseData, $category, $categories);

    }

    function add()
    {
        if (AuthHelper::checkLoggedIn()) {
            $expense = $this->hydrator->hydrate($_POST, new Expense());


            $this->model->add($expense);
            header("Location:" . BASE_URL . "gastos");
        } else {
            header("Location:" . BASE_URL . "404");
        }
        
    }

    function delete($params)
    {
        if (AuthHelper::checkLoggedIn()) {
            $expenseId = $params['pathParams'][':expenseId'];
            $expense = $this->model->get($expenseId);

            if ($this->model->delete($expenseId))
                header("Location:" . BASE_URL . "gastos");
        } else {
            header("Location:" . BASE_URL . "404");
        }
    }


    function update($params)
    {
        if (AuthHelper::checkLoggedIn()) {
            $expenseId = $params['pathParams'][':expenseId'];
            $expense = $this->hydrator->hydrate($_POST, new Expense());
            $expense->setId($expenseId);
            
            
            header("Location:" . BASE_URL . "gastos");
            $this->model->update($expense);
        } else {
            header("Location:" . BASE_URL . "404");
        }
    }

    function edit($params)
    {
        if (AuthHelper::checkLoggedIn()) {
            $expenseId = $params['pathParams'][':expenseId'];
            $expense = $this->model->get($expenseId);
            if (empty($expense))
                return $this->index(null, "The career does not exist.");
            $categoryData = $this->categoryModel->getAll();
            $this->view->showEdit($expense, $categoryData, null, null);
        } else {
            header("Location:" . BASE_URL . "404");
        }
    }
}