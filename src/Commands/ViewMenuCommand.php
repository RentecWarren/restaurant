<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ViewMenuCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('view-menu')
            ->setDescription('Displays the menu')
            ->setHelp('Displays items on the menu');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Here is the Menu.\n");

        return Command::SUCCESS;
    }
}