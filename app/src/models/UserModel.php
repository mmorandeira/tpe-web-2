<?php

require_once './models/User.php';
require_once './models/hydrator/concrete/ClassMethodsHydrator.php';

class UserModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=db;port=3306;dbname=app;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec("set names 'utf8'");
    }

    public function add(User $user)
    {
        $query = $this->db->prepare("INSERT INTO user (id, email, password) VALUES (NULL, ?, ?);");
        $query->execute(array($user->getEmail(), $user->getPassword()));
    }

    function getByEmail($email)
    {
        $query = $this->db->prepare('SELECT * FROM user WHERE email = ?;');
        $query->execute(array($email));
        $userData = $query->fetch(PDO::FETCH_ASSOC);
        $h = new ClassMethodsHydrator();
        return $h->hydrate($userData, new User());;
    }
}