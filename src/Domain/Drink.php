<?php

namespace GetWith\CoffeeMachine\Domain;

abstract class Drink
{
    public const DRINK_TEA = 'tea';
    public const DRINK_COFFEE = 'coffee';
    public const DRINK_CHOCOLATE = 'chocolate';
    public  const ALLOWED_DRINKS = [
        self::DRINK_TEA,
        self::DRINK_COFFEE,
        self::DRINK_CHOCOLATE
    ];

    protected const ERROR_SUGAR = 'The number of sugars should be between 0 and 2.';
    protected const SUCCESS_EXTRA_HOT = ' extra hot';
    protected const SUCCESS_WITH_SUGAR = ' sugars (stick included)';

    protected $sugar;
    protected $extraHot;


    /**
     * @return mixed
     */
    public function getSugar()
    {
        return $this->sugar;
    }

    /**
     * @param mixed $sugar
     */
    public function setSugar($sugar): void
    {
        $this->sugar = $sugar;
    }

    /**
     * @return mixed
     */
    public function getExtraHot()
    {
        return $this->extraHot;
    }

    /**
     * @param mixed $extraHot
     */
    public function setExtraHot($extraHot): void
    {
        $this->extraHot = $extraHot;
    }

    public function withStick(): bool {
        return $this->sugar > 0;
    }

    /** ERRORS */
    public function getErrorSugar(): string
    {
        return self::ERROR_SUGAR;
    }

    public function getSuccessExtraHot() {
        return self::SUCCESS_EXTRA_HOT;
    }

    public function getSuccessWithSugar() {
        return ' with ' . $this->sugar. self::SUCCESS_WITH_SUGAR;
    }

}
