<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $frame = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $frontWheel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cockpit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $chainset = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rearWheel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFrame(): ?string
    {
        return $this->frame;
    }

    public function setFrame(?string $frame): static
    {
        $this->frame = $frame;

        return $this;
    }

    public function getFrontWheel(): ?string
    {
        return $this->frontWheel;
    }

    public function setFrontWheel(?string $frontWheel): static
    {
        $this->frontWheel = $frontWheel;

        return $this;
    }

    public function getCockpit(): ?string
    {
        return $this->cockpit;
    }

    public function setCockpit(?string $cockpit): static
    {
        $this->cockpit = $cockpit;

        return $this;
    }

    public function getChainset(): ?string
    {
        return $this->chainset;
    }

    public function setChainset(?string $chainset): static
    {
        $this->chainset = $chainset;

        return $this;
    }

    public function getRearWheel(): ?string
    {
        return $this->rearWheel;
    }

    public function setRearWheel(?string $rearWheel): static
    {
        $this->rearWheel = $rearWheel;

        return $this;
    }
}
