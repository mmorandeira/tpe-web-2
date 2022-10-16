<?php
//namespace Models\Hydrator\Strategy;

require_once './models/hydrator/strategy/StrategyInterface.php';


class PasswordStrategy implements StrategyInterface
{
    public function hydrate($value) 
    {
        $value = password_hash($value, PASSWORD_DEFAULT);
        return $value;
    }
}