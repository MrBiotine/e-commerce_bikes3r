<?php

namespace App\Entity;

use App\Repository\OrderBikeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderBikeRepository::class)]
class OrderBike
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantityOrder = null;   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantityOrder(): ?int
    {
        return $this->quantityOrder;
    }

    public function setQuantityOrder(int $quantityOrder): static
    {
        $this->quantityOrder = $quantityOrder;

        return $this;
    }

    
}
