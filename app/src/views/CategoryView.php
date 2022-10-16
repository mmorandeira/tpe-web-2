<?php

require_once './views/View.php';

class CategoryView extends View
{
    
    public function showAll($categories)
    {
        $this->addContext('categories', $categories);
        $this->render('categories.twig');
    }

    public function showEdit($category)
    {
        $this->addContext('category', $category);
        $this->render('category-edit.twig');
    }
}