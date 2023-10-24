<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numberInvoice = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateInvoice = null;

    #[ORM\Column(nullable: true)]
    private ?float $totalttcInvoice = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberInvoice(): ?string
    {
        return $this->numberInvoice;
    }

    public function setNumberInvoice(string $numberInvoice): static
    {
        $this->numberInvoice = $numberInvoice;

        return $this;
    }

    public function getDateInvoice(): ?\DateTimeInterface
    {
        return $this->dateInvoice;
    }

    public function setDateInvoice(\DateTimeInterface $dateInvoice): static
    {
        $this->dateInvoice = $dateInvoice;

        return $this;
    }

    public function getTotalttcInvoice(): ?float
    {
        return $this->totalttcInvoice;
    }

    public function setTotalttcInvoice(?float $totalttcInvoice): static
    {
        $this->totalttcInvoice = $totalttcInvoice;

        return $this;
    }
}
