<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportMedicines extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-medicines';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $file = storage_path('app/medicines.csv');
        
        $csvData = array_map('str_getcsv', file($file));
        $headers = array_shift($csvData);

        foreach ($csvData as $row) {
            Medicine::create(array_combine($headers, $row));
        }
        
        $this->info('Medicines imported successfully!');
    }
}
