<?php

namespace App;

use Doctrine\ORM\EntityRepository;
use App\MenuItem;

/** @return MenuItem[] */
class MenuItemRepository extends EntityRepository
{
    public function getMenuItems(): array
    {
        $dql = "SELECT m.id, m.foodName, m.price FROM App\MenuItem m";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getArrayResult();
    }
    public function getMenuItemsCount(): int
    {
        $dql = "SELECT count(m.id) as total_menu_items FROM App\MenuItem m";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getScalarResult()[0]['total_menu_items'];
    }
}
