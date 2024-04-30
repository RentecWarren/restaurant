<?php

namespace App;

use Doctrine\ORM\EntityRepository;
use App\Menu;
use ArrayObject;

/** @return Menu[] */
class MenuRepository extends EntityRepository
{
    public function getMenus(): array
    {
        $dql = "SELECT m.id, m.foodName, m.price FROM App\Menu m";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getArrayResult();
    }
    
    public function getMenusCount(): int
    {
        $dql = "SELECT count(m.id) as total_menus FROM App\Menu m";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getScalarResult()[0]['total_menus'];
    }
}
