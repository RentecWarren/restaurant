<?php

namespace App\Commands;

use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\MenuItem;

class CreateMenuCommand extends Command
{
    public function __construct(private readonly ObjectManager $entityManager)
    {
        parent::__construct();
    }
    
    protected function configure()
    {
        $this
            ->setName('create-menu')
            ->setDescription('Creates the menu')
            ->setHelp('Creates initial menu, and can add a new menu items');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $menuItems = [
            "Burger" =>  9.00,
            "Fries" =>  5.00,
            "Pizza" =>  12.00,
            "Salad" =>  10.00,
        ];

        $menuItemCount = $this->entityManager->getRepository(MenuItem::class)->getMenuItemsCount();

        if($menuItemCount === 0){
            foreach ($menuItems as $foodName => $price) {
                $menuItem = new MenuItem();
                $menuItem->setFoodName((string)$foodName);
                $menuItem->setPrice((float)$price);
                $this->entityManager->persist($menuItem);
                $this->entityManager->flush();    
            }    
        }

        $output->writeln("Menu has been created.\n");
        $menuItems = $this->entityManager->getRepository(MenuItem::class)->getMenuItems();
        $output->writeln("Here is the Menu.\n");
        foreach ($menuItems as $menuItem) {
            $output->writeln($menuItem['foodName'] . ", price is $" . $menuItem['price']);
        }

        return Command::SUCCESS;
    }
}