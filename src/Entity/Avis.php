<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Pseudo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Commentaire = null;

    #[ORM\Column(nullable: true)]
    private ?int $note = null;

    #[ORM\Column(nullable: true)]
    private ?bool $IsVisible = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'Avis')]
    private ?Zoo $zoo = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->Pseudo;
    }

    public function setPseudo(?string $Pseudo): static
    {
        $this->Pseudo = $Pseudo;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(?string $Commentaire): static
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }


    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function isIsVisible(): ?bool
    {
        return $this->IsVisible;
    }

    public function setIsVisible(?bool $IsVisible): static
    {
        $this->IsVisible = $IsVisible;

        return $this;
    }



    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }


    public function __construct(
        string $pseudo,
        string $commentaire,
        int $note,
        bool $IsVisible = false,

        \DateTimeImmutable $createdAt = null
    ) {
        $this->Pseudo = $pseudo;
        $this->Commentaire = $commentaire;
        $this->note = $note;
        $this->IsVisible = $IsVisible ?: false;

        $this->createdAt = $createdAt ?: new \DateTimeImmutable();
    }

    public function getZoo(): ?Zoo
    {
        return $this->zoo;
    }

    public function setZoo(?Zoo $zoo): static
    {
        $this->zoo = $zoo;

        return $this;
    }
}
