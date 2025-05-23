<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreatePharmacistCommand extends Command
{
    protected $signature = 'pharmacist:create 
                            {name : Pharmacist name}
                            {email : Pharmacist email}
                            {phone : Pharmacist phone}
                            {--password= : Optional password (random if not provided)}';

    protected $description = 'Create a new pharmacist user';

    public function handle()
    {
        $password = $this->option('password') ?? Str::random(12);

        User::create([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
            'phone' => $this->argument('phone'),
            'role' => 'pharmacist',
            'password' => Hash::make($password),
            'email_verified_at' => now(),
        ]);

        $this->info("Pharmacist created successfully!");
        $this->line("Email: ".$this->argument('email'));
        $this->line("Password: $password");
    }
}

// usage : php artisan pharmacist:create "John Doe" john@pharmacy.com "0612345678"