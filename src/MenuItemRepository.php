<?php

namespace App;

use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;
use App\MenuItem;

/** @return MenuItem[] */
class MenuItemRepository extends EntityRepository
{
    public function getMenuItems(): array
    {
        $dql = "SELECT m.id, m.foodName, m.price FROM App\MenuItem m";

        return $this->getEntityManager()->createQuery($dql)
            ->getScalarResult();
    }
}
