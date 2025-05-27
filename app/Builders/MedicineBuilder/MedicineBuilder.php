<?php

namespace App\Builders\MedicineBuilder;

use App\Models\Medicine;
use App\Builders\MedicineBuilder\MedicineBuilderInterface;

class MedicineBuilder implements MedicineBuilderInterface
{
    private Medicine $medicine;

    public function __construct()
    {
        $this->reset();
    }

    private function reset(): void
    {
        $this->medicine = new Medicine();
    }

    public function setCode(string $code): self
    {
        $this->medicine->code = $code;
        return $this;
    }

    public function setCommercialName(string $commercialName): self
    {
        $this->medicine->commercial_name = $commercialName;
        return $this;
    }

    public function setDci(string $dci): self
    {
        $this->medicine->dci = $dci;
        return $this;
    }

    public function setCategory(string $category): self
    {
        $this->medicine->category = $category;
        return $this;
    }

    public function setLaboratory(string $laboratory): self
    {
        $this->medicine->laboratory = $laboratory;
        return $this;
    }

    public function setForm(string $form): self
    {
        $this->medicine->form = $form;
        return $this;
    }

    public function setDosage(string $dosage): self
    {
        $this->medicine->dosage = $dosage;
        return $this;
    }

    public function setPrescriptionRequired(bool $prescriptionRequired): self
    {
        $this->medicine->prescription_required = $prescriptionRequired;
        return $this;
    }

    public function setPpv(float $ppv): self
    {
        $this->medicine->ppv = $ppv;
        return $this;
    }

    public function setReorderThreshold(int $reorderThreshold): self
    {
        $this->medicine->reorder_threshold = $reorderThreshold;
        return $this;
    }

    public function build(): Medicine
    {
        $builtMedicine = $this->medicine;
        $this->reset();
        return $builtMedicine;
    }
}