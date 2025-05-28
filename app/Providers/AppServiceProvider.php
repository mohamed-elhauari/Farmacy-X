<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MedicineRepository;
use App\Repositories\MedicineRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(MedicineRepositoryInterface::class, MedicineRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
