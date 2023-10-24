<?php

namespace App\Entity;

use App\Repository\OrderCustomerRepository;
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
    private ?string $numberCustomerOrder = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateOrderCustomer = null;

    #[ORM\Column(length: 50)]
    private ?string $firstNameOrderCustomer = null;

    #[ORM\Column(length: 50)]
    private ?string $lastNameOrderCustomer = null;

    #[ORM\Column(length: 150)]
    private ?string $adressOrderCustomer = null;

    #[ORM\Column(length: 50)]
    private ?string $postcodeOrderCustomer = null;

    #[ORM\Column(length: 50)]
    private ?string $cityOrderCustomer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberCustomerOrder(): ?string
    {
        return $this->numberCustomerOrder;
    }

    public function setNumberCustomerOrder(string $numberCustomerOrder): static
    {
        $this->numberCustomerOrder = $numberCustomerOrder;

        return $this;
    }

    public function getDateOrderCustomer(): ?\DateTimeInterface
    {
        return $this->dateOrderCustomer;
    }

    public function setDateOrderCustomer(\DateTimeInterface $dateOrderCustomer): static
    {
        $this->dateOrderCustomer = $dateOrderCustomer;

        return $this;
    }

    public function getFirstNameOrderCustomer(): ?string
    {
        return $this->firstNameOrderCustomer;
    }

    public function setFirstNameOrderCustomer(string $firstNameOrderCustomer): static
    {
        $this->firstNameOrderCustomer = $firstNameOrderCustomer;

        return $this;
    }

    public function getLastNameOrderCustomer(): ?string
    {
        return $this->lastNameOrderCustomer;
    }

    public function setLastNameOrderCustomer(string $lastNameOrderCustomer): static
    {
        $this->lastNameOrderCustomer = $lastNameOrderCustomer;

        return $this;
    }

    public function getAdressOrderCustomer(): ?string
    {
        return $this->adressOrderCustomer;
    }

    public function setAdressOrderCustomer(string $adressOrderCustomer): static
    {
        $this->adressOrderCustomer = $adressOrderCustomer;

        return $this;
    }

    public function getPostcodeOrderCustomer(): ?string
    {
        return $this->postcodeOrderCustomer;
    }

    public function setPostcodeOrderCustomer(string $postcodeOrderCustomer): static
    {
        $this->postcodeOrderCustomer = $postcodeOrderCustomer;

        return $this;
    }

    public function getCityOrderCustomer(): ?string
    {
        return $this->cityOrderCustomer;
    }

    public function setCityOrderCustomer(string $cityOrderCustomer): static
    {
        $this->cityOrderCustomer = $cityOrderCustomer;

        return $this;
    }
}
