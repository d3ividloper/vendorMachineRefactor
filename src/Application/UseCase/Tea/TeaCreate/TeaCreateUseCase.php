<?php

namespace GetWith\CoffeeMachine\Application\UseCase\Tea\TeaCreate;

use GetWith\CoffeeMachine\Domain\Service\CoffeeServiceInterface;
use GetWith\CoffeeMachine\Domain\Tea;

class TeaCreateUseCase
{

    public function run($request): TeaCreateResponse
    {
        $response = new TeaCreateResponse();
        $item = new Tea();

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
