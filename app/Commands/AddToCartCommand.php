<?php

namespace App\Commands;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class AddToCartCommand implements CommandInterface
{
    protected $medicineId;
    protected $quantity;

    public function __construct(int $medicineId, int $quantity = 1)
    {
        $this->medicineId = $medicineId;
        $this->quantity = $quantity;
    }

    public function execute(): void
    {
        $user = Auth::user();
        $cart = Cart::firstOrCreate(['customer_id' => $user->id]);

        $item = CartItem::firstOrNew([
            'cart_id' => $cart->id,
            'medicine_id' => $this->medicineId
        ]);

        $item->quantity += $this->quantity;
        $item->save();
    }
}