<?php

namespace App\Entity;

use App\Repository\BikeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BikeRepository::class)]
class Bike
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $referenceBike = null;

    #[ORM\Column(length: 100)]
    private ?string $nameBike = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $decriptionBike = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReferenceBike(): ?string
    {
        return $this->referenceBike;
    }

    public function setReferenceBike(string $referenceBike): static
    {
        $this->referenceBike = $referenceBike;

        return $this;
    }

    public function getNameBike(): ?string
    {
        return $this->nameBike;
    }

    public function setNameBike(string $nameBike): static
    {
        $this->nameBike = $nameBike;

        return $this;
    }

    public function getDecriptionBike(): ?string
    {
        return $this->decriptionBike;
    }

    public function setDecriptionBike(?string $decriptionBike): static
    {
        $this->decriptionBike = $decriptionBike;

        return $this;
    }
}
