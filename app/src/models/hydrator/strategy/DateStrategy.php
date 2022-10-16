<?php
//namespace Models\Hydrator\Strategy;

require_once './models/hydrator/strategy/StrategyInterface.php';


class DateStrategy implements StrategyInterface
{
    public function hydrate($value) 
    {
        $value = date_create($value);
        return $value;
    }
}