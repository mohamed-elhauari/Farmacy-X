<?php

namespace App\Builders\MedicineBuilder;

use App\Models\Medicine;

interface MedicineBuilderInterface
{
    public function setCode(string $code): self;
    public function setCommercialName(string $commercialName): self;
    public function setDci(string $dci): self;
    public function setCategory(string $category): self;
    public function setLaboratory(string $laboratory): self;
    public function setForm(string $form): self;
    public function setDosage(string $dosage): self;
    public function setPrescriptionRequired(bool $prescriptionRequired): self;
    public function setPpv(float $ppv): self;
    public function setReorderThreshold(int $reorderThreshold): self;
    public function build(): Medicine;
}