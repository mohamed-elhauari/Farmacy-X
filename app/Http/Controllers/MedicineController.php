<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Inventory;
use Illuminate\Http\Request;

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

    public function indexPharmacist()
    {
        $medicines = Medicine::with('inventories')
                            ->orderBy('commercial_name')
                            ->paginate(10);

        return view('pharmacist.medicines.index', compact('medicines'));
    }

    public function showPharmacist($id)
    {
        $medicine = Medicine::findOrFail($id);

        return view('pharmacist.medicines.show', compact('medicine'));
    }

}
