<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class Consultation
{
    #[MongoDB\Id]
    private ?string $id = null;

    #[MongoDB\Field(type: "string")]
    private ?string $animalName = null;

    #[MongoDB\Field(type: "int")]
    private ?int $viewCount = 0;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getAnimalName(): ?string
    {
        return $this->animalName;
    }

    public function setAnimalName(string $animalName): static
    {
        $this->animalName = $animalName;

        return $this;
    }

    public function getViewCount(): ?int
    {
        return $this->viewCount;
    }

    public function setViewCount(int $viewCount): static
    {
        $this->viewCount = $viewCount;

        return $this;
    }

    public function incrementViewCount(): static
    {
        $this->viewCount++;

        return $this;
    }
}
