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
//        $orders = $this->entityManager->getRepository(Order::class)->getOrders();

        $orderCount = $this->entityManager->getRepository(Order::class)->getOrdersCount();

        if($orderCount === 0){
            $customer = $this->entityManager->find(Customer::class, 3);
            $menu = $this->entityManager->find(Menu::class, 4);
            $order = new Order();
            $order->setCustomer($customer);
            $order->setMenu($menu);
            $this->entityManager->persist($order);
            $this->entityManager->flush();        
            $output->writeln("Orders have been placed \n");
        }

        $orders = $this->entityManager->getRepository(Order::class)->getOrders();

        $output->writeln("Here are the Orders.\n");
        foreach ($orders as $order) {
            $output->writeln($order['firstName'] 
            . " " . $order['lastName']
            . ", " . $order['foodName']
            . " $" . $order['price']
            );
        }


        // $orderRepository = $this->entityManager->getRepository(Order::class);
        // $orders = $orderRepository->findAll();

        // if(!$orders){
        //     $customer = $this->entityManager->find(Customer::class, 1);
        //     $menu = $this->entityManager->find(Menu::class, 1);
        //     $order = new Order();
        //     $order->setCustomer($customer);
        //     $order->setMenu($menu);
        //     $this->entityManager->persist($order);
        //     $this->entityManager->flush();        
        //     $output->writeln("Orders have been placed \n");
        // }

        // $orders = $orderRepository->findAll();

        // foreach($orders as $order){
        //     var_dump(get_class($order));
        //     var_dump($order->getCustomer());
        //     var_dump($order->getMenu());

        //     // foreach($order->getMenuItems() as $menuItem){
        //     //     var_dump($menuItem);
        //     // }

        //     // var_dump(get_class($order->getMenuItems()));
        //     // $collectionArray = $order->getMenuItems()->toArray();
        //     // var_dump($order->getMenuItems()->toArray());
    
        // }

        // // $orders = $orderRepository->findAll();
        // // foreach ($orders as $order) {
        // //     // $output->writeln($order->getMenuItems()[0]->getFoodName());
        // //     print_r($order->getMenuItems());
        // // }


        return Command::SUCCESS;
    }
}