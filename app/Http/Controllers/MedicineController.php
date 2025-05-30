<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Medicine;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Strategies\Medicine\Sorts\NameSort;
use App\Strategies\Medicine\MedicineContext;
use App\Strategies\Medicine\Sorts\QuantitySort;
use App\Repositories\MedicineRepositoryInterface;
use App\Strategies\Medicine\Filters\CategoryFilter;
use App\Strategies\Medicine\Searchs\MultiFieldSearch;
use App\Strategies\Medicine\Filters\PrescriptionFilter;

class MedicineController extends Controller
{
    public function showAddForm()
    {
        return view('pharmacist.medicines.add');
    }

    public function showAddFormNew()
    {
        return view('pharmacist.medicines.add-new');
    }

    public function searchMedicine(Request $request)
    {
        $request->validate([
            'code' => 'required|string|min:3'
        ]);

        return redirect()->route('pharmacist.medicines.add-infos', ['code' => $request->code]);
    }

    public function showMedicineInfo($code)
    {
        $medicine = Medicine::where('code', $code)->first();
        
        if (!$medicine) {
            return redirect()->route('pharmacist.medicines.add')
                ->with('error', 'Médicament non trouvé pour le code: ' . $code);
        }

        return view('pharmacist.medicines.add-infos', compact('medicine'));
    }

    public function showMedicineInfos($code)
    {
        $medicine = Medicine::where('code', $code)->first();
        
        if (!$medicine) {
            return redirect()->route('pharmacist.medicines.add')
                ->with('error', 'Médicament non trouvé pour le code: ' . $code);
        }

        $inventories = $medicine->inventories;

        return view('pharmacist.medicines.show', compact('medicine', 'inventories'));
    }

    public function indexPharmacist(Request $request)
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

        if ($request->filled('search')) {
            $context->setSearchStrategy(new MultiFieldSearch());
            $query = $context->applySearch($query, $request->search);
        }

        // Apply sorting
        $sort = $request->get('sort', 'name');
        $direction = $request->get('direction', 'asc');

        $context->setSortStrategy(
            $sort === 'quantity' ? new QuantitySort() : new NameSort()
        );

        $query = $context->applySort($query, $direction);

        $medicines = $query->paginate(10)->appends($request->query());

        $categories = Medicine::select('category')->distinct()->pluck('category');

        return view('pharmacist.medicines.index', compact('medicines', 'categories'));
    }

    public function showPharmacist($id)
    {
        $medicine = Medicine::findOrFail($id);

        return view('pharmacist.medicines.show', compact('medicine'));
    }


    
    private $medicineRepository;

    public function __construct(MedicineRepositoryInterface $medicineRepository)
    {
        $this->medicineRepository = $medicineRepository;
    }

    public function index(Request $request)
    {
        $medicines = $this->medicineRepository->getAllAvailable($request);
        
        $categories = Medicine::select('category')->distinct()->pluck('category');
        return view('customer.medicines.index', compact('medicines', 'categories'));
    }

    public function show($id)
    {
        $medicine = $this->medicineRepository->getById($id);
        return view('customer.medicines.show', compact('medicine'));
    }

    public function indexPage()
    {
        $medicines = $this->medicineRepository->getMostPopular();
        
        return view('customer.welcome', compact('medicines'));
    }

    public function dashboardPharmacist()
    {
        // Get latest 3 orders
        $orders = Order::latest()->take(3)->get();
        // Get total orders count
        $ordersCount = Order::count();

        $medicines = Medicine::with('inventories')->get();

        // Expired = no inventory OR sum(quantity) == 0
        $expiredMedicinesCount = Medicine::whereDoesntHave('inventories')
            ->orWhereHas('inventories', function ($q) {
                $q->select(DB::raw('SUM(quantity)'))
                  ->havingRaw('SUM(quantity) = 0');
            })
            ->count();

        // Stock Faible = sum(inventories.quantity) < reorder_threshold
        $lowStockCount = $medicines->filter(function ($medicine) {
            $total = $medicine->inventories->sum('quantity');
            return $total < $medicine->reorder_threshold;
        })->count();

        // Near Expiration = inventory expiring in 30 days
        $nearExpiryCount = Inventory::whereDate('expiration_date', '<=', now()->addDays(30))
            ->where('quantity', '>', 0)
            ->count();

        $ordersPendingCount = Order::all()->where('status', 'pending')->count();
        $orderStatusCounts = Order::select('status', DB::raw('count(*) as total'))
        ->groupBy('status')
        ->pluck('total', 'status');
        

        return view('pharmacist.dashboard', compact(
            'orders',
            'ordersCount',
            'medicines',
            'expiredMedicinesCount',
            'lowStockCount',
            'nearExpiryCount',
            'ordersPendingCount',
            'orderStatusCounts'
        ));
    }


}
