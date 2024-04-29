<?php

namespace App\Commands;

use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Customer;


class CreateCustomersCommand extends Command
{
    public function __construct(private readonly ObjectManager $entityManager)
    {
        parent::__construct();
    }

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
            "Suzanne" =>  "Vega",
            "Tom" =>  "Petty",
            "Bob" =>  "Dylan",
        ];

        $customerCount = $this->entityManager->getRepository(Customer::class)->getCustomerCount();

        if($customerCount === 0){
            foreach ($customers as $firstName => $lastName) {
                $customer = new Customer();
                $customer->setFirstName($firstName);
                $customer->setLastName($lastName);
                $this->entityManager->persist($customer);
                $this->entityManager->flush();    
            }    
        }

        $output->writeln("Customers have been created.\n");

        $customers = $this->entityManager->getRepository(Customer::class)->getCustomers();
        $output->writeln("Here are the customers:\n");
        foreach ($customers as $customer) {
            $output->writeln($customer['id'] . ", " . $customer['firstName'] . " " . $customer['lastName'] . "\n");
        }
        
        return Command::SUCCESS;
    }
}