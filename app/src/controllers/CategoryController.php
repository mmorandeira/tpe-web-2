<?php

require_once './views/CategoryView.php';
require_once './models/hydrator/concrete/ClassMethodsHydrator.php';
require_once './helpers/AuthHelper.php';

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

        
        $this->view->showAll($categoryData);
    }

    function add()
    {
        if (AuthHelper::checkLoggedIn()) {
            $category = $this->hydrator->hydrate($_POST, new Category());
            header("Location:" . BASE_URL . "categorias");
    
            $this->model->add($category);
        } else {
            header("Location:" . BASE_URL . "404");
        }
    }

    function delete($params)
    {
        if (AuthHelper::checkLoggedIn()) {
            $categoryId = $params['pathParams'][':categoryId'];
            $category = $this->model->get($categoryId);

            if ($this->model->delete($categoryId))
                header("Location:" . BASE_URL . "categorias");
        } else {
            header("Location:" . BASE_URL . "404");
        }
    }

    function edit($params)
    {
        if (AuthHelper::checkLoggedIn()) {
            $categoryId = $params['pathParams'][':categoryId'];
            $category = $this->model->get($categoryId);
            
            $this->view->showEdit($category, null, null);
        } else {
            header("Location:" . BASE_URL . "404");
        }
    }

    function update($params)
    {
        if (AuthHelper::checkLoggedIn()) {
            $categoryId = $params['pathParams'][':categoryId'];
            $category = $this->hydrator->hydrate($_POST, new Category());
            $category->setId($categoryId);
            
            
            header("Location:" . BASE_URL . "categorias");
            $this->model->update($category);
        } else {
            header("Location:" . BASE_URL . "404");
        }
    }
}