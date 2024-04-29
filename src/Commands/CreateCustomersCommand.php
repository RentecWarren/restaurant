<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateCustomersCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('create-customers')
            ->setDescription('Creates new customers')
            ->setHelp('Creates initial customers, and can add a new customer');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Customers have been created.\n");

        return Command::SUCCESS;
    }
}