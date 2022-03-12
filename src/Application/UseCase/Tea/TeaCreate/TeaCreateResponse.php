<?php

namespace GetWith\CoffeeMachine\Application\UseCase\Tea\TeaCreate;

use GetWith\CoffeeMachine\Domain\Tea;

class TeaCreateResponse
{
    /** @var ?Tea */
    public $item;

    /** @var string */
    public $success;

    /** @var string */
    public $error;
}
