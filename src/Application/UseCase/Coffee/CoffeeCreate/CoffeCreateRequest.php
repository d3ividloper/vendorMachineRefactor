<?php

namespace GetWith\CoffeeMachine\Application\UseCase\Coffee\CoffeeCreate;

class CoffeCreateRequest
{
    /** @var float */
    private $price;

    /** @var int */
    private $sugar;

    /** @var bool */
    private $extraHot;

    public function __construct(float $price, float $sugar, bool $extraHot) {
        $this->price = $price;
        $this->sugar = $sugar;
        $this->extraHot = $extraHot;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getSugar()
    {
        return $this->sugar;
    }

    /**
     * @return bool
     */
    public function isExtraHot(): bool
    {
        return $this->extraHot;
    }
}
