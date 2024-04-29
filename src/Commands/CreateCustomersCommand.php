<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Customer;


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
        $customers = [
            1 =>  "Vega, Suzanne",
            2 => "Petty, Tom",
            3 => "Dylan, Bob",
        ];

        foreach ($customers as $id => $name) {
            $customer = new Customer();
            $customerName = explode(",", $name); 
            $customer->setId((int)$id);
            $customer->setFirstName((string)$customerName[1]);
            $customer->setLastName((string)$customerName[0]);
        }

        $output->writeln("Customers have been created.\n");

        return Command::SUCCESS;
    }
}