<?php

require_once './views/CategoryView.php';
require_once './models/hydrator/concrete/ClassMethodsHydrator.php';

class CategoryController {

    
    private $model;
    private $view;
    private $hydrator;

    function __construct()
    {
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
        $this->hydrator = new ClassMethodsHydrator();
    }


    function index()
    {
        $categoryData = $this->model->getAll();

        
        $this->view->showAll($categoryData, false, false, '');
    }

    function add()
    {
        $category = $this->hydrator->hydrate($_POST, new Category());
        header("Location:" . BASE_URL . "categorias");

        $this->model->add($category);
        $this->index(null, '');
    }

    function delete($params)
    {
        $categoryId = $params['pathParams'][':categoryId'];
        $category = $this->model->get($categoryId);

        if ($this->model->delete($categoryId))
            header("Location:" . BASE_URL . "categorias");
    }
}