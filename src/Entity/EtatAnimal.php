<?php

namespace App\Entity;

use App\Repository\EtatAnimalRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity(repositoryClass: EtatAnimalRepository::class)]
class EtatAnimal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $etat;

    #[ORM\Column(type: 'string', length: 255)]
    private $nourriture;

    #[ORM\Column(type: 'float')]
    private $grammage;

    #[ORM\Column(type: 'datetime')]
    private $datePassage;

    #[ORM\Column(type: 'text', nullable: true)]
    private $detailEtat;

    #[ORM\ManyToOne(targetEntity: Animal::class, inversedBy: 'etatAnimals')]
    #[ORM\JoinColumn(nullable: false)]
    private $animal;

    #[ORM\ManyToOne(targetEntity: Consultation::class, inversedBy: 'etatAnimals')]
    private $consultation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;
        return $this;
    }

    public function getNourriture(): ?string
    {
        return $this->nourriture;
    }

    public function setNourriture(string $nourriture): self
    {
        $this->nourriture = $nourriture;
        return $this;
    }

    public function getGrammage(): ?float
    {
        return $this->grammage;
    }

    public function setGrammage(float $grammage): self
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

    public function getDetailEtat(): ?string
    {
        return $this->detailEtat;
    }

    public function setDetailEtat(?string $detailEtat): self
    {
        $this->detailEtat = $detailEtat;
        return $this;
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

    public function getConsultation(): ?Consultation
    {
        return $this->consultation;
    }

    public function setConsultation(?Consultation $consultation): self
    {
        $this->consultation = $consultation;
        return $this;
    }
}
