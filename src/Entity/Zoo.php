<?php

namespace App\Entity;

use App\Repository\ZooRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ZooRepository::class)]
class Zoo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::GUID, nullable: true)]
    private ?string $uuid = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\OneToMany(targetEntity: Service::class, mappedBy: 'zoo')]
    private Collection $Service;

    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'zoo')]
    private Collection $User;

    #[ORM\OneToMany(targetEntity: Avis::class, mappedBy: 'zoo')]
    private Collection $Avis;

    #[ORM\OneToMany(targetEntity: Animal::class, mappedBy: 'zoo')]
    private Collection $Animal;

    public function __construct()
    {
        $this->Service = new ArrayCollection();
        $this->User = new ArrayCollection();
        $this->Avis = new ArrayCollection();
        $this->Animal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(?string $uuid): static
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getService(): Collection
    {
        return $this->Service;
    }

    public function addService(Service $service): static
    {
        if (!$this->Service->contains($service)) {
            $this->Service->add($service);
            $service->setZoo($this);
        }

        return $this;
    }

    public function removeService(Service $service): static
    {
        if ($this->Service->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getZoo() === $this) {
                $service->setZoo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->User;
    }

    public function addUser(User $user): static
    {
        if (!$this->User->contains($user)) {
            $this->User->add($user);
            $user->setZoo($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->User->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getZoo() === $this) {
                $user->setZoo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getAvis(): Collection
    {
        return $this->Avis;
    }

    public function addAvi(Avis $avi): static
    {
        if (!$this->Avis->contains($avi)) {
            $this->Avis->add($avi);
            $avi->setZoo($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): static
    {
        if ($this->Avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getZoo() === $this) {
                $avi->setZoo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getAnimal(): Collection
    {
        return $this->Animal;
    }

    public function addAnimal(Animal $animal): static
    {
        if (!$this->Animal->contains($animal)) {
            $this->Animal->add($animal);
            $animal->setZoo($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): static
    {
        if ($this->Animal->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getZoo() === $this) {
                $animal->setZoo(null);
            }
        }

        return $this;
    }
}
