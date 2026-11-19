<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'car')]
class AdminCar
{
    #[ORM\Id]
    //#[ORM\GeneratedValue]
    #[ORM\Column(name: 'VIN', type: 'string', length: 17)]
    protected ?string $vin = null;

    #[ORM\Column(name: 'LicensePlate', type: 'string', length: 8)]
    protected ?string $plate = null;

    #[ORM\Column(name: 'Color', type: 'string', length: 6)]
    protected ?string $color = null;

    #[ORM\Column(name: 'type', type: 'string', length: 40)]
    protected ?string $type = null;

    #[ORM\Column(name: 'Make', length: 255)]
    protected ?string $make = null;

    #[ORM\Column(name: 'Model', length: 255)]
    protected ?string $model = null;

    #[ORM\Column(name: 'PriceOfKm')]
    protected ?float $price = null;

    #[ORM\Column(name: 'ImageName', length: 255)]
    protected ?string $image = null;

    
    #[ORM\ManyToOne(targetEntity: VehicleCategory::class)]
    #[ORM\JoinColumn(name: 'category_id', referencedColumnName: 'id', nullable: true)]
    private ?VehicleCategory $category = null;

    public function getCategory(): ?VehicleCategory
    {
        return $this->category;
    }

    public function setCategory(?VehicleCategory $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(string $vin): static
    {
        $this->vin = $vin;

        return $this;
    }

    public function getPlate(): ?string
    {
        return $this->plate;
    }

    public function setPlate(string $plate): static
    {
        $this->plate = $plate;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getMake(): ?string
    {
        return $this->make;
    }

    public function setMake(string $make): static
    {
        $this->make = $make;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    
}