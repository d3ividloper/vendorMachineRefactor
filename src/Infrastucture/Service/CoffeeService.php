<?php

namespace GetWith\CoffeeMachine\Infrastucture\Service;

use GetWith\CoffeeMachine\Domain\Service\CoffeeServiceInterface;

class CoffeeService implements CoffeeServiceInterface
{
    // TODO: Add repository property when persist data

    public function create($price, $sugar)
    {
       // TODO make persist at database
    }
}
