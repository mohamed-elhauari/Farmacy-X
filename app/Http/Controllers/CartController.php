<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commands\AddToCartCommand;
use App\Commands\CreateOrderCommand;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $command = new AddToCartCommand($request->medicine_id, $request->quantity ?? 1);
        $command->execute();

        return redirect()->back()->with('success', 'Medicine added to cart');
    }

    public function createOrder(Request $request)
    {
        $request->validate([
            'prescription' => 'nullable|image|max:2048'
        ]);

        $filePath = null;

        if ($request->hasFile('prescription')) {
            $filePath = $request->file('prescription')->store('prescriptions', 'public');
        }

        $command = new CreateOrderCommand($request->file('prescription'));
        $command->execute();

        return redirect()->route('customer.medicines.index')->with('success', 'Order placed successfully');
    }

    public function index()
    {
        $user = auth()->user();
        $cart = $user->cart()->with('items.medicine')->firstOrCreate([]);

        $requiresPrescription = $cart->items->contains(fn($item) => $item->medicine && $item->medicine->prescription_required);

        // Calculate total amount
        $totalAmount = $cart->items->sum(function ($item) {
            return ($item->quantity) * ($item->medicine->ppv);
        });

        return view('customer.orders.cart', [
            'cart' => $cart,
            'requiresPrescription' => $requiresPrescription,
            'totalAmount' => $totalAmount
        ]);
    }

}
