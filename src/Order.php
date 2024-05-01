<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: 'orders')]
class Order
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\OneToOne(targetEntity: Customer::class, inversedBy:'order')]
    #[ORM\JoinColumn(name:'customer_id', referencedColumnName:'id', nullable: true)]
    private Customer|null $customer = null;

    #[ORM\OneToOne(targetEntity: Menu::class, inversedBy:'order')]
    #[ORM\JoinColumn(name:'menu_id', referencedColumnName:'id', nullable: true)]
    private Menu|null $menu = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCustomer(): Customer|null
    {
        return $this->customer;
    }

    public function setCustomer($customer): void
    {
        // $customer->addOrder($this);
        $this->customer = $customer;
    }
    public function getMenu(): Menu|null
    {
        return $this->menu;
    }

    public function setMenu($menu): void
    {
        $this->menu = $menu;
    }
}
