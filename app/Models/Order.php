<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'order_date',
        'status',
        'total_amount',
        'prescription_id'  // Reference to the prescription
    ];

    /**
     * The customer who placed this order
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * The prescription associated with this order (if any)
     */
    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }

    /**
     * All items in this order
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Calculate the total amount for the order
     */
    public function calculateTotal()
    {
        return $this->items->sum(function($item) {
            return $item->quantity * $item->price;
        });
    }
}
