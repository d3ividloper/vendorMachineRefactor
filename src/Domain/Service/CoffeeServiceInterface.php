<?php

namespace GetWith\CoffeeMachine\Domain\Service;

interface CoffeeServiceInterface
{
    public function create($price, $sugar);
}
