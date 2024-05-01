<?php

namespace App\Commands;

use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Menu;

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
        $menus = [
            "Burger" =>  9.50,
            "Fries" =>  5.99,
            "Pizza" =>  12.50,
            "Salad" =>  10.99,
        ];

        $menuCount = $this->entityManager->getRepository(Menu::class)->getMenusCount();

        if($menuCount === 0){
            foreach ($menus as $foodName => $price) {
                $menu = new Menu();
                $menu->setFoodName((string)$foodName);
                $menu->setPrice((float)$price);
                $this->entityManager->persist($menu);
                $this->entityManager->flush();    
            }    
        }

        $output->writeln("Menu has been created.\n");
        $menus = $this->entityManager->getRepository(Menu::class)->getMenus();
        $output->writeln("Here is the Menu.\n");
        foreach ($menus as $menu) {
            $output->writeln($menu['foodName'] . ", price is $" . number_format($menu['price'], 2, '.', ' '));
        }

        return Command::SUCCESS;
    }
}