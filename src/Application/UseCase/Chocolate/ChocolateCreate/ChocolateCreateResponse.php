<?php

namespace GetWith\CoffeeMachine\Application\UseCase\Chocolate\ChocolateCreate;

use GetWith\CoffeeMachine\Domain\Chocolate;

class ChocolateCreateResponse
{
    /** @var ?Chocolate */
    public $item;

    /** @var string */
    public $success;

    /** @var string */
    public $error;
}
