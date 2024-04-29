<?php

namespace App;

use Doctrine\ORM\EntityRepository;
use App\Customer;

/** @return Customer[] */
class CustomerRepository extends EntityRepository
{
    public function getCustomers(): array
    {
        $dql = "SELECT c.id, c.firstName, c.lastName FROM App\Customer c";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getArrayResult();
    }

    public function getCustomerCount(): int
    {
        $dql = "SELECT count(c.id) as total_customers FROM App\Customer c";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getScalarResult()[0]['total_customers'];
    }
}
