<?php

namespace App\Entity;

use App\Repository\VehicleCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleCategoryRepository::class)]
class VehicleCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $name = null;

    /**
     * @var Collection<int, Vehicle>
     */
    

    

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Vehicle>
     */
    

    

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? '';
    }
}
