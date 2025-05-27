<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'lot', 'medicine_id', 'quantity', 'purchase_price', 
        'dco', 'expiration_date'
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}