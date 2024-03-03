<?php

namespace App\Entity;

use App\Repository\NourritureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NourritureRepository::class)]
class Nourriture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'nourritures')]
    private ?InformationAnimal $InformationAnimal = null;

    #[ORM\ManyToOne(inversedBy: 'nourritures')]
    private ?Repas $Repas = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getInformationAnimal(): ?InformationAnimal
    {
        return $this->InformationAnimal;
    }

    public function setInformationAnimal(?InformationAnimal $InformationAnimal): static
    {
        $this->InformationAnimal = $InformationAnimal;

        return $this;
    }

    public function getRepas(): ?Repas
    {
        return $this->Repas;
    }

    public function setRepas(?Repas $Repas): static
    {
        $this->Repas = $Repas;

        return $this;
    }
}
