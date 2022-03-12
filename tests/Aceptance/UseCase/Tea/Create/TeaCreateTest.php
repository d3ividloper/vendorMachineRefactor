<?php

namespace GetWith\CoffeeMachine\Tests\Aceptance\UseCase\Tea\Create;

use GetWith\CoffeeMachine\Application\UseCase\Coffee\CoffeeCreate\CoffeeCreateUseCase;
use GetWith\CoffeeMachine\Application\UseCase\Tea\TeaCreate\TeaCreateRequest;
use GetWith\CoffeeMachine\Application\UseCase\Tea\TeaCreate\TeaCreateUseCase;
use GetWith\CoffeeMachine\Domain\Coffee;
use GetWith\CoffeeMachine\Domain\Tea;
use PHPUnit\Framework\TestCase;

class TeaCreateTest extends TestCase
{
    private function getRequest($price, $sugar, $extraHot)
    {
        return new TeaCreateRequest($price, $sugar, $extraHot);
    }

    public function testShouldCreateTeaItem() {
        $useCase = new TeaCreateUseCase();
        $response = $useCase->run($this->getRequest(0.5, 2, true));
        self::assertInstanceOf(Tea::class, $response->item);
    }

    public function testShouldReturnTeaSuccessMessage() {
        $useCase = new TeaCreateUseCase();
        $response = $useCase->run($this->getRequest(0.5, 2, true));
        self::assertEquals($response->success, 'You have ordered a tea extra hot with 2 sugars (stick included)');
    }

    public function testShouldReturnSugarErrorMessage() {
        $useCase = new TeaCreateUseCase();
        $response = $useCase->run($this->getRequest(0.4, 3, true));
        self::assertEquals($response->error, 'The number of sugars should be between 0 and 2.');
    }

    public function testShouldReturnPriceErrorMessage() {
        $useCase = new TeaCreateUseCase();
        $response = $useCase->run($this->getRequest(0.3, 3, true));
        self::assertEquals($response->error, 'The tea costs 0.4.');
    }
}
