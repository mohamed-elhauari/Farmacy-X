<?php

namespace App\Repositories;

use App\Models\Medicine;

class MedicineRepository implements MedicineRepositoryInterface
{
    public function getAllAvailable()
    {
        return Medicine::whereHas('inventories', function ($query) {
            $query->where('quantity', '>', 0);
            })
            ->with('inventories')
            ->orderBy('commercial_name')
            ->paginate(12); 
        
    }

    public function getById(int $id)
    {
        $medicine = Medicine::with('inventories')->findOrFail($id);

        // Optional: Hide if quantity is 0
        if ($medicine->inventories->sum('quantity') <= 0) {
            abort(404);
        }

        return $medicine;
    }
}
