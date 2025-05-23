<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'code', 'name', 'generic_name', 'category', 
        'manufacturer', 'dosage_form', 'strength', 'requires_prescription'
    ];

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }
}