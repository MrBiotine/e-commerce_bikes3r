<?php

namespace App\Entity;

use App\Repository\ReceiptRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReceiptRepository::class)]
class Receipt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numberReceipt = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateReceipt = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $totalttc = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?OrderCustomer $OrderCustomer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberReceipt(): ?string
    {
        return $this->numberReceipt;
    }

    public function setNumberReceipt(string $numberReceipt): static
    {
        $this->numberReceipt = $numberReceipt;

        return $this;
    }

    public function getDateReceipt(): ?\DateTimeInterface
    {
        return $this->dateReceipt;
    }

    public function setDateReceipt(\DateTimeInterface $dateReceipt): static
    {
        $this->dateReceipt = $dateReceipt;

        return $this;
    }

    public function getTotalttc(): ?string
    {
        return $this->totalttc;
    }

    public function setTotalttc(?string $totalttc): static
    {
        $this->totalttc = $totalttc;

        return $this;
    }

    public function getOrderCustomer(): ?OrderCustomer
    {
        return $this->OrderCustomer;
    }

    public function setOrderCustomer(OrderCustomer $OrderCustomer): static
    {
        $this->OrderCustomer = $OrderCustomer;

        return $this;
    }
}
