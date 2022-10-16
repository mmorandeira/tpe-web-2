<?php

require_once './views/View.php';

class ExpenseView extends View
{

    public function showAll($expenses, $categories)
    {
        $this->addContext('expenses', $expenses);
        $this->addContext('categories', $categories);
        $this->render('expenses.twig');
    }

    public function showAllOfCategory($expenses, $category, $categories)
    {
        
        $this->addContext('expenses', $expenses);
        $this->addContext('category', $category);
        $this->addContext('categories', $categories);
        $this->render('expenses.twig');
    }

    public function showOne($expense, $category)
    {
        $this->addContext('expense', $expense);
        $this->addContext('category', $category);
        $this->render('expense.twig');
    }

    public function showEdit($expense, $categories)
    {
        $this->addContext('expense', $expense);
        $this->addContext('categories', $categories);
        $this->render('expense-edit.twig');
    }
}