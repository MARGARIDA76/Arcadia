<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]
class Horaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Jour = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $Ouverture = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $fermeture = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $Horaire_Ouverture = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $Horaire_Fermuture = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Ouvert = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->Jour;
    }

    public function setJour(?string $Jour): static
    {
        $this->Jour = $Jour;

        return $this;
    }

    public function getOuverture(): ?\DateTimeImmutable
    {
        return $this->Ouverture;
    }

    public function setOuverture(?\DateTimeImmutable $Ouverture): static
    {
        $this->Ouverture = $Ouverture;

        return $this;
    }

    public function getFermeture(): ?\DateTimeImmutable
    {
        return $this->fermeture;
    }

    public function setFermeture(?\DateTimeImmutable $fermeture): static
    {
        $this->fermeture = $fermeture;

        return $this;
    }

    public function getHoraireOuverture(): ?\DateTimeImmutable
    {
        return $this->Horaire_Ouverture;
    }

    public function setHoraireOuverture(?\DateTimeImmutable $Horaire_Ouverture): static
    {
        $this->Horaire_Ouverture = $Horaire_Ouverture;

        return $this;
    }

    public function getHoraireFermuture(): ?\DateTimeImmutable
    {
        return $this->Horaire_Fermuture;
    }

    public function setHoraireFermuture(?\DateTimeImmutable $Horaire_Fermuture): static
    {
        $this->Horaire_Fermuture = $Horaire_Fermuture;

        return $this;
    }

    public function isOuvert(): ?bool
    {
        return $this->Ouvert;
    }

    public function setOuvert(?bool $Ouvert): static
    {
        $this->Ouvert = $Ouvert;

        return $this;
    }


    public function __construct(

        ?int $jour = null,
        ?bool $ouvert = true,
        ?\DateTimeInterface $Horaire_ouverture = null,
        ?\DateTimeInterface $Horaire_fermeture = null
    ) {
        $this->$jour = $jour;
        $this->Ouvert = $ouvert;
        $this->Horaire_Ouverture = $Horaire_ouverture;
        $this->Horaire_Fermuture = $Horaire_fermeture;
    }
}
