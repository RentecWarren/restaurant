<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'menuitems')]
class Menu
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $foodName;

    #[ORM\Column(type: 'float')]
    private float $price;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFoodName(): string
    {
        return $this->foodName;
    }

    public function setFoodName($foodName): void
    {
        $this->foodName = $foodName;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }
}
