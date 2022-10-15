<?php

require_once './views/CategoryView.php';

class CategoryController {

    
    private $model;
    private $view;


    function __construct()
    {
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
    }


    function index(){
        $categoryData = $this->model->getAll();

        
        $this->view->showAll($categoryData, false, false, '');
    }

}