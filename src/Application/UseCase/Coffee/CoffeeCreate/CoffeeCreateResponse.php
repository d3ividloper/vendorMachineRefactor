<?php

namespace GetWith\CoffeeMachine\Application\UseCase\Coffee\CoffeeCreate;

use GetWith\CoffeeMachine\Domain\Coffee;

class CoffeeCreateResponse
{
    /** @var ?Coffee */
    public $item;

    /** @var string */
    public $success;

    /** @var string */
    public $error;
}
