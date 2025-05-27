<?php

namespace App\Builders\InventoryBuilder;

use App\Models\Inventory;
use App\Models\Medicine;
use DateTimeInterface;

class InventoryBuilder implements InventoryBuilderInterface
{
    private Inventory $inventory;

    public function __construct()
    {
        $this->reset();
    }

    private function reset(): void
    {
        $this->inventory = new Inventory();
    }

    public function forMedicine(Medicine $medicine): self
    {
        $this->inventory->medicine()->associate($medicine);
        return $this;
    }

    public function setLot(string $lot): self
    {
        $this->inventory->lot = $lot;
        return $this;
    }

    public function setQuantity(int $quantity): self
    {
        $this->inventory->quantity = $quantity;
        return $this;
    }

    public function setPurchasePrice(float $purchasePrice): self
    {
        $this->inventory->purchase_price = $purchasePrice;
        return $this;
    }

    public function setExpirationDate(DateTimeInterface $expirationDate): self
    {
        $this->inventory->expiration_date = $expirationDate;
        return $this;
    }

    public function setDco(?string $dco): self
    {
        $this->inventory->dco = $dco;
        return $this;
    }

    public function build(): Inventory
    {
        // Validate required fields before building
        if (!$this->inventory->medicine_id) {
            throw new \RuntimeException('Medicine must be set before building inventory');
        }

        if (!$this->inventory->lot) {
            throw new \RuntimeException('Lot number must be set');
        }

        $builtInventory = $this->inventory;
        $this->reset();
        return $builtInventory;
    }
}