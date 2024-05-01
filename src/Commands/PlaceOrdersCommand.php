<?php

namespace App\Commands;

use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Order;
use App\Customer;
use App\Menu;

class PlaceOrdersCommand extends Command
{
    public function __construct(private readonly ObjectManager $entityManager)
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('place-orders')
            ->setDescription('Places orders for each customer')
            ->setHelp('This command places all orders');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $orderCount = $this->entityManager->getRepository(Order::class)->getOrdersCount();

        if($orderCount === 0){
            $menuIds = $this->getMenuIds();
            $this->placeOrder(1, $menuIds[0]);
            $this->placeOrder(2, $menuIds[1]); 
            $this->placeOrder(3, $menuIds[2]); 
            $output->writeln("Orders have been placed \n");
        }

        $orders = $this->entityManager->getRepository(Order::class)->getOrders();

        $output->writeln("Here are the Orders.\n");
        foreach ($orders as $order) {
            $price = number_format($order['price'], 2, '.', ' ');

            $output->writeln($order['firstName'] 
            . " " . $order['lastName']
            . ", " . $order['foodName']
            . " $" . $price
            );
        }

        $total = $this->entityManager->getRepository(Order::class)->getOrderTotal();
        $total = number_format($total, 2, '.', ' ');

        $output->writeln("\nTotal = \${$total}.\n");

        return Command::SUCCESS;
    }

    private function getMenuIds(): array
    {
        $menuIds = [1, 2, 3, 4];
        shuffle($menuIds);
        return array_slice($menuIds, 0, 3);
    }
    private function placeOrder(int $customerId, int $menuId): void
    {
        $customer = $this->entityManager->find(Customer::class, $customerId);
        $menu = $this->entityManager->find(Menu::class, $menuId);
        $order = new Order();
        $order->setCustomer($customer);
        $order->setMenu($menu);
        $this->entityManager->persist($order);
        $this->entityManager->flush();        
    }
}