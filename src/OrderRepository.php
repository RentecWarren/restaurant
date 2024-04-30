<?php

namespace App;

use Doctrine\ORM\EntityRepository;
use App\Order;
use ArrayObject;

/** @return Order[] */
class OrderRepository extends EntityRepository
{
     /** @return Order[] */
    public function myOrders(): array
    {
        $dql = "SELECT o, c, m FROM App\Order o JOIN o.customer c JOIN o.menuitem m";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getResult();
    }    
}
