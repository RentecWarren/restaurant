<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExportOrdersXMLCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('export-orders-xml')
            ->setDescription('Exports all orders to XML format')
            ->setHelp('This command exports all orders to an XML file');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Orders exported as XML \n");

        return Command::SUCCESS;
    }
}