<?php

namespace GetWith\CoffeeMachine\Domain;

class Chocolate extends Drink
{
    private const ERROR_PRICE = 'The chocolate costs 0.6.';
    private const SUCCESS_DRINK_DONE = 'You have ordered a chocolate';


    // TODO add own properties of chocolate
    private $price = 0.6;

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
