<?php
//namespace Model;

require_once './models/hydrator/concrete/ClassMethodsHydrator.php';
require_once './models/hydrator/strategy/DateTimeStrategy.php';
require_once './models/Expense.php';

class ExpenseModel {

    private $db;
    private $hydrator;

    function __construct()
    {
        $this->db = new PDO('mysql:host=db;port=3306;dbname=app;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec("set names 'utf8'");

        $this->hydrator = new ClassMethodsHydrator();
        $this->hydrator->addStrategy('date', new DateTimeStrategy());
    }

    function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM expense;');
        $query->execute();
        $expenseData = $query->fetchAll(PDO::FETCH_ASSOC);

        $result = array();
        foreach($expenseData as $expense) {
            $result[] = $this->hydrator->hydrate($expense, new Expense());
        }

        return $result;
    }

    function get($expenseId) {
        $query = $this->db->prepare('SELECT * FROM expense WHERE id = ?;');
        $query->execute(array($expenseId));
        $expenseData = $query->fetch(PDO::FETCH_ASSOC);

        return $this->hydrator->hydrate($expenseData, new Expense());
    }


}