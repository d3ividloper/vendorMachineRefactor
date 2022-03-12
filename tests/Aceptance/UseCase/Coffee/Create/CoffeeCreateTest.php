<?php

namespace GetWith\CoffeeMachine\Tests\Aceptance\UseCase\Coffee\Create;

use GetWith\CoffeeMachine\Application\UseCase\Coffee\CoffeeCreate\CoffeCreateRequest;
use GetWith\CoffeeMachine\Application\UseCase\Coffee\CoffeeCreate\CoffeeCreateUseCase;
use GetWith\CoffeeMachine\Domain\Coffee;
use PHPUnit\Framework\TestCase;

class CoffeeCreateTest extends TestCase
{
    private function getRequest($price, $sugar, $extraHot)
    {
        return new CoffeCreateRequest($price, $sugar, $extraHot);
    }

    public function testShouldCreateCoffeeItem() {
        $useCase = new CoffeeCreateUseCase();
        $response = $useCase->run($this->getRequest(0.5, 2, true));
        self::assertInstanceOf(Coffee::class, $response->item);
    }

    public function testShouldReturnCoffeSuccessMessage() {
        $useCase = new CoffeeCreateUseCase();
        $response = $useCase->run($this->getRequest(0.5, 2, true));
        self::assertEquals($response->success, 'You have ordered a coffee extra hot with 2 sugars (stick included)');
    }

    public function testShouldReturnSugarErrorMessage() {
        $useCase = new CoffeeCreateUseCase();
        $response = $useCase->run($this->getRequest(0.5, 3, true));
        self::assertEquals($response->error, 'The number of sugars should be between 0 and 2.');
    }

    public function testShouldReturnPriceErrorMessage() {
        $useCase = new CoffeeCreateUseCase();
        $response = $useCase->run($this->getRequest(0.4, 3, true));
        self::assertEquals($response->error, 'The coffee costs 0.5.');
    }
}
