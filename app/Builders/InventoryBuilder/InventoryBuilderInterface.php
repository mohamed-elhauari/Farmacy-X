<?php

namespace App\Builders\InventoryBuilder;

use DateTimeInterface;
use App\Models\Medicine;
use App\Models\Inventory;

interface InventoryBuilderInterface
{
    public function forMedicine(Medicine $medicine): self;
    public function setLot(string $lot): self;
    public function setQuantity(int $quantity): self;
    public function setPurchasePrice(float $price): self;
    public function setExpirationDate(DateTimeInterface $expirationDate): self;
    public function setDco(?string $dco): self;
    public function build(): Inventory;
}