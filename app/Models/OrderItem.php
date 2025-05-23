<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'medicine_id',
        'quantity',
        'price'
    ];

    /**
     * The order this item belongs to
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * The medicine being ordered
     */
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

    /**
     * Calculate the subtotal for this item
     */
    public function getSubtotalAttribute()
    {
        return $this->quantity * $this->price;
    }
}