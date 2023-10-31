<?php

namespace App\Entity;

use App\Repository\OrderCustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderCustomerRepository::class)]
class OrderCustomer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numberOrder = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateOrder = null;

    #[ORM\Column(length: 50)]
    private ?string $firstName = null;

    #[ORM\Column(length: 50)]
    private ?string $lastName = null;

    #[ORM\Column(length: 150)]
    private ?string $address = null;

    #[ORM\Column(length: 50)]
    private ?string $postcode = null;

    #[ORM\Column(length: 50)]
    private ?string $city = null;

    #[ORM\OneToMany(mappedBy: 'OrderCustomer', targetEntity: OrderBike::class)]
    private Collection $orderBikes;

    public function __construct()
    {
        $this->orderBikes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberOrder(): ?string
    {
        return $this->numberOrder;
    }

    public function setNumberOrder(string $numberOrder): static
    {
        $this->numberOrder = $numberOrder;

        return $this;
    }

    public function getDateOrder(): ?\DateTimeInterface
    {
        return $this->dateOrder;
    }

    public function setDateOrder(\DateTimeInterface $dateOrder): static
    {
        $this->dateOrder = $dateOrder;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): static
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    // Magic function __toString

    public function __toString(){
        return $this->firstName + " " + $this->lastName ;        
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
            $orderBike->setOrderCustomer($this);
        }

        return $this;
    }

    public function removeOrderBike(OrderBike $orderBike): static
    {
        if ($this->orderBikes->removeElement($orderBike)) {
            // set the owning side to null (unless already changed)
            if ($orderBike->getOrderCustomer() === $this) {
                $orderBike->setOrderCustomer(null);
            }
        }

        return $this;
    }
}
