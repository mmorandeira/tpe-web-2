<?php

require_once './models/hydrator/concrete/ClassMethodsHydrator.php';
require_once './models/Category.php';


class CategoryModel
{
    
    private $db;
    private $hydrator;

    function __construct()
    {
        $this->db = new PDO('mysql:host=db;port=3306;dbname=app;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec("set names 'utf8'");

        $this->hydrator = new ClassMethodsHydrator();
    }

    function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM category;');
        $query->execute();
        $expenseData = $query->fetchAll(PDO::FETCH_ASSOC);

        $result = array();
        foreach($expenseData as $expense) {
            $result[] = $this->hydrator->hydrate($expense, new Category());
        }

        return $result;
    }

    function get($categoryId) {
        $query = $this->db->prepare('SELECT * FROM category WHERE id = ?;');
        $query->execute(array($categoryId));
        $categoryData = $query->fetch(PDO::FETCH_ASSOC);

        return $this->hydrator->hydrate($categoryData, new Category());
    }

}