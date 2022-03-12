<?php

namespace GetWith\CoffeeMachine\Application\UseCase\Chocolate\ChocolateCreate;

use GetWith\CoffeeMachine\Domain\Chocolate;

class ChocolateCreateUseCase
{
    public function __construct() { }

    public function run($request): ChocolateCreateResponse
    {
        $response = new ChocolateCreateResponse();
        $item = new Chocolate();

        if ($request->getPrice() < $item->getPrice()) {
            $response->error = $item->getErrorPrice();
            return $response;
        }

        if ($request->getSugar() < 0 || $request->getSugar() > 2) {
            $response->error = $item->getErrorSugar();
            return $response;
        }

        // set items properties
        $item->setSugar($request->getSugar());
        $item->setExtraHot($request->isExtraHot());

        // set return success message
        $response->success = $item->getSuccessMessage();

        // set response item in order to use in a future
        $response->item = $item;
        return $response;
    }
}
