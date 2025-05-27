<?php

namespace App\Http\Controllers;

use App\Builders\MedicineBuilder\MedicineBuilder;
use App\Builders\InventoryBuilder\InventoryBuilder;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class MedicineImportController extends Controller
{
    public function showImportForm()
    {
        return view('pharmacist.medicines.add');
    }

    public function storeMedicines(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt'
        ]);

        try {
            DB::transaction(function () use ($request) {
                $csv = Reader::createFromPath($request->file('csv_file')->getRealPath());
                $csv->setHeaderOffset(0);

                $records = $csv->getRecords();
                $data = iterator_to_array($records);

                foreach ($data as $record) {

                    $medicine = Medicine::where('code', $record['code'])->first();

                    if (!$medicine) {
                        $medicine = (new MedicineBuilder())
                            ->setCode($record['code'])
                            ->setCommercialName($record['commercial_name'])
                            ->setDci($record['dci'])
                            ->setCategory($record['category'])
                            ->setLaboratory($record['laboratory'])
                            ->setForm($record['form'])
                            ->setDosage($record['dosage'])
                            ->setPrescriptionRequired((bool)$record['prescription_required'])
                            ->setPpv($record['ppv'])
                            ->setReorderThreshold($record['reorder_threshold'])
                            ->build();
                        $medicine->save();
                    }

                    (new InventoryBuilder())
                        ->forMedicine($medicine)
                        ->setLot($record['lot'])
                        ->setQuantity($record['quantity'])
                        ->setPurchasePrice($record['purchase_price'])
                        ->setExpirationDate(new \DateTime($record['expiration_date']))
                        ->setDco($record['dco'])
                        ->build()
                        ->save();
                }
            });

            return redirect()->back()
                ->with('success', 'Médicaments importés avec succès!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erreur lors de l\'import: '.$e->getMessage());
        }
    }

}