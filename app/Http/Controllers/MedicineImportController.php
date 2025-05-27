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
                ->with('success', 'Médicaments importés au stock avec succès!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erreur lors de l\'import: '.$e->getMessage());
        }
    }

    public function storeMedicinesNew(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt'
        ]);

        try {
            DB::transaction(function () use ($request) {
                $csv = Reader::createFromPath($request->file('csv_file')->getRealPath());
                $csv->setHeaderOffset(0);
                $data = iterator_to_array($csv->getRecords());

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
                }
            });

            return redirect()->back()
                ->with('success', 'Médicaments importés avec succès!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erreur lors de l\'import: '.$e->getMessage());
        }
    }

    public function storeMedicineNew(Request $request)
    {
        $request->validate([
            'code' => 'required|string|min:3'
        ]);

        $code = $request->input('code');

        try {
            DB::transaction(function () use ($code) {
                // Path to the reference medecines file
                $referencePath = storage_path('app/public/medicines.csv');

                // Check if file exists
                if (!file_exists($referencePath) || !is_readable($referencePath)) {
                    throw new \Exception("Le fichier des médicaments est introuvable ou illisible.");
                }

                // Read the CSV
                $csv = Reader::createFromPath($referencePath);
                $csv->setHeaderOffset(0);
                $records = iterator_to_array($csv->getRecords());

                // Search for the medicine by code
                $matchedRecord = null;
                foreach ($records as $record) {
                    if ($record['code'] === $code) {
                        $matchedRecord = $record;
                        break;
                    }
                }

                if (!$matchedRecord) {
                    throw new \Exception("Aucun médicament trouvé avec le code: $code");
                }

                // Check if the medicine already exists
                if (Medicine::where('code', $code)->exists()) {
                    throw new \Exception("Le médicament avec ce code existe déjà.");
                }

                // Build and save the new medicine
                $medicine = (new MedicineBuilder())
                    ->setCode($matchedRecord['code'])
                    ->setCommercialName($matchedRecord['commercial_name'])
                    ->setDci($matchedRecord['dci'])
                    ->setCategory($matchedRecord['category'])
                    ->setLaboratory($matchedRecord['laboratory'])
                    ->setForm($matchedRecord['form'])
                    ->setDosage($matchedRecord['dosage'])
                    ->setPrescriptionRequired((bool)$matchedRecord['prescription_required'])
                    ->setPpv($matchedRecord['ppv'])
                    ->setReorderThreshold($matchedRecord['reorder_threshold'])
                    ->build();
                $medicine->save();
            });

            return redirect()->back()
                ->with('success', 'Médicament ajouté avec succès !');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erreur : '.$e->getMessage());
        }
    }

}