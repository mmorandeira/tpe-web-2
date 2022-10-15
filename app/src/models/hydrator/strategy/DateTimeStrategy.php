<?php
//namespace Models\Hydrator\Strategy;

require_once './models/hydrator/strategy/StrategyInterface.php';


use DateTime;

class DateTimeStrategy implements StrategyInterface
{
    public function hydrate($value) 
    {
        $value = new DateTime($value);
        return $value;
    }
}