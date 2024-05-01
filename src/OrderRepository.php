<?php

namespace App;

use Doctrine\ORM\EntityRepository;
// use App\Order;
use ArrayObject;

/** @return Order[] */
class OrderRepository extends EntityRepository
{
    public function getOrders(): array
    {
        $dql = "SELECT o.id, c.firstName, c.lastName, m.foodName, m.price FROM App\Order o JOIN o.customer c JOIN o.menu m";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getScalarResult();
    }
    
    public function getOrdersCount(): int
    {
        $dql = "SELECT count(o.id) as total_orders FROM App\Order o";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getScalarResult()[0]['total_orders'];
    }
    
    public function getOrderTotal(): float
    {
        $dql = "SELECT sum(m.price) as order_total FROM App\Order o JOIN o.menu m";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getScalarResult()[0]['order_total'];
    }            
}
