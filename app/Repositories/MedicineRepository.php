<?php

namespace App\Repositories;

use App\Models\Medicine;
use App\Strategies\Medicine\Sorts\NameSort;
use App\Strategies\Medicine\MedicineContext;
use App\Strategies\Medicine\Sorts\QuantitySort;
use App\Strategies\Medicine\Filters\CategoryFilter;
use App\Strategies\Medicine\Filters\PrescriptionFilter;

class MedicineRepository implements MedicineRepositoryInterface
{
    public function getAllAvailable($request)
    {
        $context = new MedicineContext();
        $query = Medicine::query();

        // Apply filters
        if ($request->filled('category')) {
            $context->setFilterStrategy(new CategoryFilter());
            $query = $context->applyFilters($query, $request->category);
        }

        if ($request->filled('prescription')) {
            $context->setFilterStrategy(new PrescriptionFilter());
            $query = $context->applyFilters($query, $request->prescription);
        }

        // Apply sorting
        $sort = $request->get('sort', 'name');
        $direction = $request->get('direction', 'asc');

        $context->setSortStrategy(
            $sort === 'quantity' ? new QuantitySort() : new NameSort()
        );

        $query = $context->applySort($query, $direction);

        // Filter medicines that have inventories with quantity > 0
        $query = $query->whereHas('inventories', function ($query) {
            $query->where('quantity', '>', 0);
        });

        return $query->with('inventories')->paginate(12)->appends($request->query());
        
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

    public function getMostPopular($limit = 3)
    {
        return Medicine::with('inventories')
            ->whereHas('inventories', fn($q) => $q->where('quantity', '>', 0))
            // **** quantity orders
            ->take($limit)
            ->get();
    }
}
