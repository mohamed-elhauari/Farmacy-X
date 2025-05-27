<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
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

}
