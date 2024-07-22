<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity(repositoryClass: ConsultationRepository::class)]
class Consultation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Animal::class, inversedBy: 'consultations')]
    #[ORM\JoinColumn(nullable: false)]
    private $animal;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nourriture;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $grammage;

    #[ORM\Column(type: 'datetime')]
    private $datePassage;

    #[ORM\Column(type: 'text', nullable: true)]
    private $details;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $veterinaire;

    #[ORM\ManyToOne(targetEntity: Habitat::class)]
    #[ORM\JoinColumn(nullable: true)]
    private $habitat;

    #[ORM\ManyToOne(targetEntity: CommentaireHabitat::class)]
    private $commentaireHabitat;

    #[ORM\OneToMany(targetEntity: EtatAnimal::class, mappedBy: 'consultation')]
    private $etatAnimals;

    public function __construct()
    {
        $this->etatAnimals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): self
    {
        $this->animal = $animal;
        return $this;
    }

    public function getNourriture(): ?string
    {
        return $this->nourriture;
    }

    public function setNourriture(?string $nourriture): self
    {
        $this->nourriture = $nourriture;
        return $this;
    }

    public function getGrammage(): ?int
    {
        return $this->grammage;
    }

    public function setGrammage(?int $grammage): self
    {
        $this->grammage = $grammage;
        return $this;
    }

    public function getDatePassage(): ?DateTimeInterface
    {
        return $this->datePassage;
    }

    public function setDatePassage(DateTimeInterface $datePassage): self
    {
        $this->datePassage = $datePassage;
        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): self
    {
        $this->details = $details;
        return $this;
    }

    public function getVeterinaire(): ?User
    {
        return $this->veterinaire;
    }

    public function setVeterinaire(?User $veterinaire): self
    {
        $this->veterinaire = $veterinaire;
        return $this;
    }

    public function getHabitat(): ?Habitat
    {
        return $this->habitat;
    }

    public function setHabitat(?Habitat $habitat): self
    {
        $this->habitat = $habitat;
        return $this;
    }

    public function getEtatAnimals(): Collection
    {
        return $this->etatAnimals;
    }

    public function addEtatAnimal(EtatAnimal $etatAnimal): self
    {
        if (!$this->etatAnimals->contains($etatAnimal)) {
            $this->etatAnimals[] = $etatAnimal;
            $etatAnimal->setConsultation($this);
        }
        return $this;
    }

    public function removeEtatAnimal(EtatAnimal $etatAnimal): self
    {
        if ($this->etatAnimals->removeElement($etatAnimal)) {
            if ($etatAnimal->getConsultation() === $this) {
                $etatAnimal->setConsultation(null);
            }
        }
        return $this;
    }

    public function getCommentaireHabitat(): ?CommentaireHabitat
    {
        return $this->commentaireHabitat;
    }

    public function setCommentaireHabitat(?CommentaireHabitat $commentaireHabitat): self
    {
        $this->commentaireHabitat = $commentaireHabitat;
        return $this;
    }
}
