<?php

namespace App\Commands;

use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\MenuItem;

class ViewMenuCommand extends Command
{
    public function __construct(private readonly ObjectManager $entityManager)
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('view-menu')
            ->setDescription('Displays the menu')
            ->setHelp('Displays items on the menu');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $menuItems = $this->entityManager->getRepository(MenuItem::class)->getMenuItems();
        $output->writeln("Here is the Menu.\n");
        foreach ($menuItems as $menuItem) {
            $output->writeln($menuItem['foodName'] . ", price is $" . $menuItem['price']);
        }


        return Command::SUCCESS;
    }
}