<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
#[ORM\Table(name: 'vehicleview2')]
#[ORM\InheritanceType('SINGLE_TABLE')]
//#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'type', type: 'string', length: 30)]
#[ORM\DiscriminatorMap([
    'Car' => Car::class,
    'Motorcycle' => Motorcycle::class
])]
abstract class Vehicle
{
    #[ORM\Id]
    //#[ORM\GeneratedValue]
    #[ORM\Column(type: 'string', length: 40)]
    protected ?string $id = null;

    #[ORM\Column(name: 'Make', length: 255)]
    protected ?string $make = null;

    #[ORM\Column(name: 'Model', length: 255)]
    protected ?string $model = null;

    #[ORM\Column(name: 'PriceOfKm')]
    protected ?float $price = null;

    #[ORM\Column(name: 'ImageName', length: 255)]
    protected ?string $image = null;


    ////

    #[ORM\Column(name: 'category_id')]
    public ?string $category = null;

   

    public function getId(): ?string { return $this->id; }

    public function getMake(): ?string { return $this->make; }
    public function setMake(string $make): static { $this->make = $make; return $this; }

    public function getModel(): ?string { return $this->model; }
    public function setModel(string $model): static { $this->model = $model; return $this; }

    public function getPrice(): ?int { return $this->price; }
    public function setPrice(int $price): static { $this->price = $price; return $this; }

    public function getImage(): ?string { return $this->image; }
    public function setImage(?string $image): static { $this->image = $image; return $this; }

    public function getCategory(): ?string { return $this->category; }
    public function setCategory(?string $category): static { $this->category = $category; return $this; }

}