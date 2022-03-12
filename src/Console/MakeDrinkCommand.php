<?php

namespace GetWith\CoffeeMachine\Console;

use GetWith\CoffeeMachine\Application\UseCase\Chocolate\ChocolateCreate\ChocolateCreateRequest;
use GetWith\CoffeeMachine\Application\UseCase\Chocolate\ChocolateCreate\ChocolateCreateUseCase;
use GetWith\CoffeeMachine\Application\UseCase\Coffee\CoffeeCreate\CoffeCreateRequest;
use GetWith\CoffeeMachine\Application\UseCase\Coffee\CoffeeCreate\CoffeeCreateUseCase;
use GetWith\CoffeeMachine\Application\UseCase\Tea\TeaCreate\TeaCreateRequest;
use GetWith\CoffeeMachine\Application\UseCase\Tea\TeaCreate\TeaCreateUseCase;
use GetWith\CoffeeMachine\Domain\Drink;
use GetWith\CoffeeMachine\Infrastucture\Service\CoffeeService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MakeDrinkCommand extends Command
{
    protected static $defaultName = 'app:order-drink';

    public function __construct()
    {
        parent::__construct(MakeDrinkCommand::$defaultName);
    }


    protected function configure(): void
    {
        $this->addArgument(
            'drink-type',
            InputArgument::REQUIRED,
            'The type of the drink. (Tea, Coffee or Chocolate)'
        );

        $this->addArgument(
            'money',
            InputArgument::REQUIRED,
            'The amount of money given by the user'
        );

        $this->addArgument(
            'sugars',
            InputArgument::OPTIONAL,
            'The number of sugars you want. (0, 1, 2)',
            0
        );

        $this->addOption(
            'extra-hot',
            'e',
            InputOption::VALUE_NONE,
            $description = 'If the user wants to make the drink extra hot'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $drinkType = strtolower($input->getArgument('drink-type'));
        if (!in_array($drinkType, Drink::ALLOWED_DRINKS)) {
            $output->writeln('The drink type should be tea, coffee or chocolate.');
        } else {
            /**
             * Tea       --> 0.4
             * Coffee    --> 0.5
             * Chocolate --> 0.6
             */
            $money = $input->getArgument('money');
            $sugars = $input->getArgument('sugars');
            $extraHot = $input->getOption('extra-hot');

            switch ($drinkType) {
                case 'tea':
                    $useCaseRequest = new TeaCreateRequest($money, $sugars, $extraHot);
                    $useCase = new TeaCreateUseCase();
                    $response = $useCase->run($useCaseRequest);
                    break;
                case 'coffee':
                    $useCaseRequest = new CoffeCreateRequest($money, $sugars, $extraHot);
                    $useCase = new CoffeeCreateUseCase();
                    $response = $useCase->run($useCaseRequest);
                    break;
                case 'chocolate':
                    $useCaseRequest = new ChocolateCreateRequest($money, $sugars, $extraHot);
                    $useCase = new ChocolateCreateUseCase();
                    $response = $useCase->run($useCaseRequest);
                    break;
            }

            if (!empty($response->error)) {
                $output->writeln($response->error);
                return 0;
            }

            $output->writeln($response->success);
        }

        return 0;
    }
}
