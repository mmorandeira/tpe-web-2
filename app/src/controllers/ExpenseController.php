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


    function __construct()
    {
        $this->model = new ExpenseModel();
        $this->categoryModel = new CategoryModel();
        $this->view = new ExpenseView();
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
            //    return $this->view->showNotFoundPage();

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


        $expenseData = $this->model->getAllByCategory($categoryId);

        
        $this->view->showAllOfCategory($expenseData, $category, false, false, '');

    }

    function add()
    {
        $hydrator = new ClassMethodsHydrator();
        $hydrator->addStrategy('date', new DateStrategy());
        $expense = $hydrator->hydrate($_POST, new Expense());


        $this->model->add($expense);
        $this->index(null, '');

        
    }

    function delete($params)
    {
        $expenseId = $params['pathParams'][':expenseId'];
        $expense = $this->model->get($expenseId);

        if ($this->model->delete($expenseId))
            header("Location:" . BASE_URL . "gastos");
    }

}