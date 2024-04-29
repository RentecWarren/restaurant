<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'orders')]
class Order
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: 'integer')]
    private int $customerId;

    #[ORM\Column(type: 'integer')]
    private int $menuItemId;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function setCustomerId($customerId): void
    {
        $this->customerId = $customerId;
    }

    public function getMenuItemId(): int
    {
        return $this->menuItemId;
    }

    public function setMenuItem($menuItemId): void
    {
        $this->menuItemId = $menuItemId;
    }
}
