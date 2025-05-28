<?php

namespace App\Repositories;
use Illuminate\Http\Request;

interface MedicineRepositoryInterface
{
    public function getAllAvailable(Request $request);
    public function getById(int $id);
}
