<?php

namespace App\Models;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'code', 'commercial_name', 'dci', 
        'category', 'laboratory', 'form', 
        'dosage', 'prescription_required', 
        'ppv', 'reorder_threshold'
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function getQuantityAttribute()
    {
        return $this->inventories->sum('quantity');
    }

    public function getImageUrlAttribute()
    {
        $fallbackNumber = $this->id % 10 + 1; 
        return asset("storage/medicines/medicine-{$fallbackNumber}.jpg");
    }

}