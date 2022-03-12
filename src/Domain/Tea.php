<?php

namespace GetWith\CoffeeMachine\Domain;

class Tea extends Drink
{
    private const ERROR_PRICE = 'The tea costs 0.4.';
    private const SUCCESS_DRINK_DONE = 'You have ordered a tea';


    // TODO add own properties of coffee
    private $price = 0.4;

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    public function getErrorPrice(): string
    {
        return self::ERROR_PRICE;
    }

    public function getSuccessMessage(): string
    {
        $message = self::SUCCESS_DRINK_DONE;

        // extra hot
        if ($this->extraHot) {
            $message .= $this->getSuccessExtraHot();
        }

        // check sugar
        if ($this->sugar > 0) {
            $message .= $this->getSuccessWithSugar();
        }

        return $message;
    }
}
