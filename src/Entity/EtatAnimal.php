<?php

namespace App\Entity;

use App\Repository\EtatAnimalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtatAnimalRepository::class)]
class EtatAnimal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\Column(length: 255)]
    private ?string $nourriture = null;

    #[ORM\Column(type: 'float')]
    private ?float $grammage = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $datePassage = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $detailEtat = null;

    #[ORM\ManyToOne(inversedBy: 'etatAnimals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getNourriture(): ?string
    {
        return $this->nourriture;
    }

    public function setNourriture(string $nourriture): static
    {
        $this->nourriture = $nourriture;

        return $this;
    }

    public function getGrammage(): ?float
    {
        return $this->grammage;
    }

    public function setGrammage(float $grammage): static
    {
        $this->grammage = $grammage;

        return $this;
    }

    public function getDatePassage(): ?\DateTimeInterface
    {
        return $this->datePassage;
    }

    public function setDatePassage(\DateTimeInterface $datePassage): static
    {
        $this->datePassage = $datePassage;

        return $this;
    }

    public function getDetailEtat(): ?string
    {
        return $this->detailEtat;
    }

    public function setDetailEtat(?string $detailEtat): static
    {
        $this->detailEtat = $detailEtat;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): static
    {
        $this->animal = $animal;

        return $this;
    }
}
