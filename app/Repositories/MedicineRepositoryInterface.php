<?php

namespace App\Repositories;

interface MedicineRepositoryInterface
{
    public function getAllAvailable();
    public function getById(int $id);
}
