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
    private ?string $descriptionBike = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2, nullable: true)]
    private ?string $priceBike = null;

    #[ORM\ManyToOne(inversedBy: 'bikes')]
    private ?Category $Category = null;

    #[ORM\ManyToOne(inversedBy: 'bikes')]
    private ?Color $Color = null;

    #[ORM\ManyToOne(inversedBy: 'bikes')]
    private ?Size $Size = null;

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

    public function getDescriptionBike(): ?string
    {
        return $this->descriptionBike;
    }

    public function setDescriptionBike(?string $descriptionBike): static
    {
        $this->descriptionBike = $descriptionBike;

        return $this;
    }
    

    public function getCategory(): ?Category
    {
        return $this->Category;
    }

    public function setCategory(?Category $Category): static
    {
        $this->Category = $Category;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->Color;
    }

    public function setColor(?Color $Color): static
    {
        $this->Color = $Color;

        return $this;
    }

    public function getSize(): ?Size
    {
        return $this->Size;
    }

    public function setSize(?Size $Size): static
    {
        $this->Size = $Size;

        return $this;
    }

    // magic function __toString()

    public function __toString(){
        return $this->nameBike;
    }
}
