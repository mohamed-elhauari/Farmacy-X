<?php

namespace App\Repositories;

use App\Models\Medicine;
use App\Models\OrderItem;
use App\Strategies\Medicine\Sorts\NameSort;
use App\Strategies\Medicine\MedicineContext;
use App\Strategies\Medicine\Sorts\QuantitySort;
use App\Strategies\Medicine\Filters\CategoryFilter;
use App\Strategies\Medicine\Searchs\MultiFieldSearch;
use App\Strategies\Medicine\Filters\PrescriptionFilter;

class MedicineRepository implements MedicineRepositoryInterface
{
    public function getAllAvailable($request)
    {
        $context = new MedicineContext();
        $query = Medicine::query();

        if ($request->filled('search')) {
            $context->setSearchStrategy(new MultiFieldSearch());
            $query = $context->applySearch($query, $request->search);
        }

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
        // Step 1: Get top medicine IDs ordered by total quantity sold
        $topMedicineIds = OrderItem::select('medicine_id')
            ->selectRaw('SUM(quantity) as total_sold')
            ->groupBy('medicine_id')
            ->orderByDesc('total_sold')
            ->limit($limit)
            ->pluck('medicine_id');

        // Step 2: Retrieve Medicine models for those IDs, in the same order
        $medicines = Medicine::with('inventories')
            ->whereIn('id', $topMedicineIds)
            ->whereHas('inventories', fn($q) => $q->where('quantity', '>', 0))
            ->get()
            // Optional: Sort them to match the order in $topMedicineIds
            ->sortBy(function ($medicine) use ($topMedicineIds) {
                return array_search($medicine->id, $topMedicineIds->toArray());
            })
            ->values();

        return $medicines;
    }

}
