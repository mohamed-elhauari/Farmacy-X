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
    /*
    public function showImportForm(Request $request)
    {
        return view('pharmacist.medicines.add');
    }
        */

    public function storeMedicines(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt'
        ]);

        try {
            DB::transaction(function () use ($request) {
                $csv = Reader::createFromPath($request->file('csv_file')->getRealPath());
                $csv->setHeaderOffset(0);
                $data = iterator_to_array($csv->getRecords());

                $referencePath = storage_path('app/public/medicines.csv');
                $referenceCsv = Reader::createFromPath($referencePath);
                $referenceCsv->setHeaderOffset(0);
                $referenceData = iterator_to_array($referenceCsv->getRecords());

                $referenceMap = [];
                foreach ($referenceData as $ref) {
                    $referenceMap[$ref['code']] = $ref;
                }

                foreach ($data as $record) {

                    $code = $record['code'];
                    // Check if reference data for this code exists
                    if (!isset($referenceMap[$code])) {
                        throw new \Exception("Code $code not found in reference file.");
                    }

                    $ref = $referenceMap[$code];

                    $medicine = Medicine::where('code', $code)->first();

                    if (!$medicine) {
                        $medicine = (new MedicineBuilder())
                            ->setCode($ref['code'])
                            ->setCommercialName($ref['commercial_name'])
                            ->setDci($ref['dci'])
                            ->setCategory($ref['category'])
                            ->setLaboratory($ref['laboratory'])
                            ->setForm($ref['form'])
                            ->setDosage($ref['dosage'])
                            ->setPrescriptionRequired((bool)$ref['prescription_required'])
                            ->setPpv($ref['ppv'])
                            ->setReorderThreshold($ref['reorder_threshold'])
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