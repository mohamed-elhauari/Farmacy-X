<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'medicine_id', 'quantity', 'price', 
        'expiry_date', 'reorder_level'
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}