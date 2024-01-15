<?php

namespace App\Entity;

use App\Repository\BikeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    
    #[ORM\ManyToOne(inversedBy: 'bikes')]
    private ?Category $Category = null;

    #[ORM\ManyToOne(inversedBy: 'bikes')]
    private ?Color $Color = null;

    #[ORM\ManyToOne(inversedBy: 'bikes')]
    private ?Size $Size = null;

    #[ORM\OneToMany(mappedBy: 'Bike', targetEntity: OrderBike::class)]
    private Collection $orderBikes;

    #[ORM\ManyToOne(inversedBy: 'bikes')]
    private ?Image $Image = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2, nullable: true)]
    private ?string $priceBike = null;

    public function __construct()
    {
        $this->orderBikes = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, OrderBike>
     */
    public function getOrderBikes(): Collection
    {
        return $this->orderBikes;
    }

    public function addOrderBike(OrderBike $orderBike): static
    {
        if (!$this->orderBikes->contains($orderBike)) {
            $this->orderBikes->add($orderBike);
            $orderBike->setBike($this);
        }

        return $this;
    }

    public function removeOrderBike(OrderBike $orderBike): static
    {
        if ($this->orderBikes->removeElement($orderBike)) {
            // set the owning side to null (unless already changed)
            if ($orderBike->getBike() === $this) {
                $orderBike->setBike(null);
            }
        }

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->Image;
    }

    public function setImage(?Image $Image): static
    {
        $this->Image = $Image;

        return $this;
    }

    public function getPriceBike(): ?string
    {
        return $this->priceBike;
    }

    public function setPriceBike(?string $priceBike): static
    {
        $this->priceBike = $priceBike;

        return $this;
    }
}
