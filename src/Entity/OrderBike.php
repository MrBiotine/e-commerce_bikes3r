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

    #[ORM\ManyToOne(inversedBy: 'orderBikes')]
    private ?Bike $Bike = null;

    #[ORM\ManyToOne(inversedBy: 'orderBikes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?OrderCustomer $OrderCustomer = null;   

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

    public function getBike(): ?Bike
    {
        return $this->Bike;
    }

    public function setBike(?Bike $Bike): static
    {
        $this->Bike = $Bike;

        return $this;
    }

    public function getOrderCustomer(): ?OrderCustomer
    {
        return $this->OrderCustomer;
    }

    public function setOrderCustomer(?OrderCustomer $OrderCustomer): static
    {
        $this->OrderCustomer = $OrderCustomer;

        return $this;
    }

    
}
