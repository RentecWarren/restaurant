<?php

namespace App\Commands;

require_once __DIR__ . "/../Util/ValidInput.php";

use Util\ValidInput;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class OrderCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('order')
            ->addArgument('customerId', InputArgument::OPTIONAL, 'Customer Id: 1, 2, or 3')
            ->addArgument('foodNames', InputArgument::OPTIONAL, 'Comma seperated list of food')
            ->setDescription('Shows current orders')
            ->setHelp('This command shows all current orders.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $customerId = (int)$input->getArgument('customerId');
        $foodNames = (string)$input->getArgument('foodNames');

        $output->writeln("Hello, " . get_current_user() . "!");
        $output->writeln("There are currently 0 orders placed for 0 customers.\n");
        $output->writeln("See available food items: menu");
        $output->writeln("Place an order: order <customerId> <foodItem> \n");

        $validInput = new ValidInput;        
        if($customerId && $validInput->customerId()) {
            $output->writeln("Customer Id: {$customerId}");
        }

        if($foodNames) {
            $output->writeln("Food Names: {$foodNames}");
        }

        return Command::SUCCESS;
    }
}