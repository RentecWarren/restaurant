<?php

namespace Restaurant\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class MenuCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('menu')
            ->addArgument('burger', InputArgument::OPTIONAL, 'Do you want a burger?')
            ->addArgument('chili', InputArgument::OPTIONAL, 'Do you want chili?')
            ->setDescription('Prints Restaurant Menu')
            ->setHelp('This command prints list of items on the menu.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("The menu for " . date("l") . " is: \n");
        $output->writeln("Pizza    $10.00");
        $output->writeln("Burger   $7.00");
        $output->writeln("Hot Dog  $5.00");
        $output->writeln("Salad    $6.00");
        return Command::SUCCESS;
    }
}