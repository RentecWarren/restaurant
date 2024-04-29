<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateMenuCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('create-menu')
            ->setDescription('Creates the menu')
            ->setHelp('Creates initial menu, and can add a new menu items');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Menu has been created.\n");

        return Command::SUCCESS;
    }
}