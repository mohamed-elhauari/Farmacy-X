<?php

namespace App\Commands;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateOrderCommand implements CommandInterface
{
    protected $prescriptionImage;

    public function __construct(?UploadedFile $prescriptionImage = null)
    {
        $this->prescriptionImage = $prescriptionImage;
    }

    public function execute(): void
    {
        $user = Auth::user();
        $cart = Cart::with('items.medicine')->where('customer_id', $user->id)->firstOrFail();

        $prescriptionId = null;
        if ($this->prescriptionImage) {
            $path = $this->prescriptionImage->store('prescriptions', 'public');
            $prescription = $user->prescriptions()->create(['file_path' => $path]);
            $prescriptionId = $prescription->id;
        }

        $total = $cart->items->sum(fn ($item) => $item->medicine->ppv * $item->quantity);

        $order = Order::create([
            'customer_id' => $user->id,
            'total_amount' => $total,
            'prescription_id' => $prescriptionId,
        ]);

        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'medicine_id' => $item->medicine_id,
                'quantity' => $item->quantity,
                'price' => $item->medicine->ppv,
            ]);
        }

        $cart->items()->delete();
    }
}