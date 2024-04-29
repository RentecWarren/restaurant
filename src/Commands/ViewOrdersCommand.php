<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ViewOrdersCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('view-orders')
            ->setDescription('Shows all current orders')
            ->setHelp('This command shows all current orders.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Hello, " . get_current_user() . "!");
        $output->writeln("There are currently 0 orders placed for 0 customers.\n");
        $output->writeln("See available food items: menu");
        $output->writeln("Place an order: order <customerId> <foodItem> \n");

        return Command::SUCCESS;
    }
}