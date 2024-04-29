<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PlaceOrdersCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('place-orders')
            ->setDescription('Places orders for each customer')
            ->setHelp('This command places all orders');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Orders have been placed \n");

        return Command::SUCCESS;
    }
}