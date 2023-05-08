<?php

namespace App\Entity;

use App\Repository\UserInformationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserInformationRepository::class)]
class UserInformation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $height = null;

    #[ORM\Column]
    private ?float $weight = null;

    #[ORM\Column(nullable: true)]
    private ?float $bmi = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getBmi(): ?float
    {
        return $this->bmi;
    }

    public function setBmi(?float $bmi): self
    {
        $this->bmi = $bmi;

        return $this;
    }

    public function calculateBmi(): self
    {
    if ($this->height !== null && $this->weight !== null) {
        $this->bmi = $this->weight / ($this->height ** 2);
    }

    return $this;
}

}
