<?php

namespace App\Entity;

use App\Repository\OpeningHoursRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningHoursRepository::class)]
class OpeningHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $openingMonday = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closingMonday = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $openingTuesday = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closingTuesday = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $openingWednesday = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closingWednesday = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $openingThursday = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closingThursday = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $openingFriday = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closingFriday = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $openingSaturday = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closingSaturday = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $openingSunday = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closingSunday = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpeningMonday(): ?\DateTimeInterface
    {
        return $this->openingMonday;
    }

    public function setOpeningMonday(?\DateTimeInterface $openingMonday): static
    {
        $this->openingMonday = $openingMonday;

        return $this;
    }

    public function getClosingMonday(): ?\DateTimeInterface
    {
        return $this->closingMonday;
    }

    public function setClosingMonday(?\DateTimeInterface $closingMonday): static
    {
        $this->closingMonday = $closingMonday;

        return $this;
    }

    public function getOpeningTuesday(): ?\DateTimeInterface
    {
        return $this->openingTuesday;
    }

    public function setOpeningTuesday(?\DateTimeInterface $openingTuesday): static
    {
        $this->openingTuesday = $openingTuesday;

        return $this;
    }

    public function getClosingTuesday(): ?\DateTimeInterface
    {
        return $this->closingTuesday;
    }

    public function setClosingTuesday(?\DateTimeInterface $closingTuesday): static
    {
        $this->closingTuesday = $closingTuesday;

        return $this;
    }

    public function getOpeningWednesday(): ?\DateTimeInterface
    {
        return $this->openingWednesday;
    }

    public function setOpeningWednesday(?\DateTimeInterface $openingWednesday): static
    {
        $this->openingWednesday = $openingWednesday;

        return $this;
    }

    public function getClosingWednesday(): ?\DateTimeInterface
    {
        return $this->closingWednesday;
    }

    public function setClosingWednesday(?\DateTimeInterface $closingWednesday): static
    {
        $this->closingWednesday = $closingWednesday;

        return $this;
    }

    public function getOpeningThursday(): ?\DateTimeInterface
    {
        return $this->openingThursday;
    }

    public function setOpeningThursday(?\DateTimeInterface $openingThursday): static
    {
        $this->openingThursday = $openingThursday;

        return $this;
    }

    public function getClosingThursday(): ?\DateTimeInterface
    {
        return $this->closingThursday;
    }

    public function setClosingThursday(?\DateTimeInterface $closingThursday): static
    {
        $this->closingThursday = $closingThursday;

        return $this;
    }

    public function getOpeningFriday(): ?\DateTimeInterface
    {
        return $this->openingFriday;
    }

    public function setOpeningFriday(?\DateTimeInterface $openingFriday): static
    {
        $this->openingFriday = $openingFriday;

        return $this;
    }

    public function getClosingFriday(): ?\DateTimeInterface
    {
        return $this->closingFriday;
    }

    public function setClosingFriday(?\DateTimeInterface $closingFriday): static
    {
        $this->closingFriday = $closingFriday;

        return $this;
    }

    public function getOpeningSaturday(): ?\DateTimeInterface
    {
        return $this->openingSaturday;
    }

    public function setOpeningSaturday(?\DateTimeInterface $openingSaturday): static
    {
        $this->openingSaturday = $openingSaturday;

        return $this;
    }

    public function getClosingSaturday(): ?\DateTimeInterface
    {
        return $this->closingSaturday;
    }

    public function setClosingSaturday(?\DateTimeInterface $closingSaturday): static
    {
        $this->closingSaturday = $closingSaturday;

        return $this;
    }

    public function getOpeningSunday(): ?\DateTimeInterface
    {
        return $this->openingSunday;
    }

    public function setOpeningSunday(?\DateTimeInterface $openingSunday): static
    {
        $this->openingSunday = $openingSunday;

        return $this;
    }

    public function getClosingSunday(): ?\DateTimeInterface
    {
        return $this->closingSunday;
    }

    public function setClosingSunday(?\DateTimeInterface $closingSunday): static
    {
        $this->closingSunday = $closingSunday;

        return $this;
    }
}
