<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Race = null;


    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[Vich\UploadableField(mapping: "animal", fileNameProperty: "imageName")]
    private $imageFile;




    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName = null;

    #[ORM\OneToMany(targetEntity: Repas::class, mappedBy: 'animal')]
    private Collection $Repas;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Habitat $Habitat = null;

    #[ORM\OneToMany(targetEntity: InformationAnimal::class, mappedBy: 'animal')]
    private Collection $InformationAnimal;

    #[ORM\ManyToOne(inversedBy: 'Animal')]
    private ?Zoo $zoo = null;

    public function __construct()
    {
        $this->Repas = new ArrayCollection();
        $this->InformationAnimal = new ArrayCollection();
    }



    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->Race;
    }

    public function setRace(?string $Race): static
    {
        $this->Race = $Race;

        return $this;
    }



    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }




    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): static
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return Collection<int, Repas>
     */
    public function getRepas(): Collection
    {
        return $this->Repas;
    }

    public function addRepa(Repas $repa): static
    {
        if (!$this->Repas->contains($repa)) {
            $this->Repas->add($repa);
            $repa->setAnimal($this);
        }

        return $this;
    }

    public function removeRepa(Repas $repa): static
    {
        if ($this->Repas->removeElement($repa)) {
            // set the owning side to null (unless already changed)
            if ($repa->getAnimal() === $this) {
                $repa->setAnimal(null);
            }
        }

        return $this;
    }

    public function getHabitat(): ?Habitat
    {
        return $this->Habitat;
    }

    public function setHabitat(?Habitat $Habitat): static
    {
        $this->Habitat = $Habitat;

        return $this;
    }

    /**
     * @return Collection<int, InformationAnimal>
     */
    public function getInformationAnimal(): Collection
    {
        return $this->InformationAnimal;
    }

    public function addInformationAnimal(InformationAnimal $informationAnimal): static
    {
        if (!$this->InformationAnimal->contains($informationAnimal)) {
            $this->InformationAnimal->add($informationAnimal);
            $informationAnimal->setAnimal($this);
        }

        return $this;
    }

    public function removeInformationAnimal(InformationAnimal $informationAnimal): static
    {
        if ($this->InformationAnimal->removeElement($informationAnimal)) {
            // set the owning side to null (unless already changed)
            if ($informationAnimal->getAnimal() === $this) {
                $informationAnimal->setAnimal(null);
            }
        }

        return $this;
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
