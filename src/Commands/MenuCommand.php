<?php

namespace Restaurant\Commands;

// 02 Importing the Command base class
use Symfony\Component\Console\Command\Command;
// 03 Importing the input/output interfaces
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

// 04 Defining the class extending the Command base class
class MenuCommand extends Command
{
    // 05 Implementing the configure method
    protected function configure()
    {
        $this
            ->setName('menu')
            ->addArgument('burger', InputArgument::OPTIONAL, 'Do you want a burger?')
            ->addArgument('chili', InputArgument::OPTIONAL, 'Do you want chili?')
            ->setDescription('Prints Restaurant Menu')
            ->setHelp('This command prints list of items on the menu.');
    }

    // 09 implementing the execute method
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // 10 using the Output for writing something
        $output->writeln("Hello, " . get_current_user() . "!");
        $output->writeln("The menu for " . date("l") . " is: ");
        $output->writeln("burger or chili");
        // 11 returning the success status
        return Command::SUCCESS;
    }
}