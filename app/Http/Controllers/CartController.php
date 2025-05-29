<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Commands\AddToCartCommand;
use App\Commands\CreateOrderCommand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

        return redirect()->route('customer.orders.index')->with('success', 'Order placed successfully');
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


    public function remove($id)
    {
        $user = Auth::user();

        // Get the user's cart
        $cart = Cart::where('customer_id', $user->id)->first();

        if (!$cart) {
            return redirect()->back()->with('error', 'Panier introuvable.');
        }

        // Find the item by ID and cart ID (to ensure it belongs to the user)
        $item = CartItem::where('id', $id)->where('cart_id', $cart->id)->first();

        if (!$item) {
            return redirect()->back()->with('error', 'Article non trouvé dans votre panier.');
        }

        $item->delete();

        return redirect()->back()->with('success', 'Article retiré du panier.');
    }


    public function updateQuantity(Request $request)
{
    $request->validate([
        'item_id' => 'required|exists:cart_items,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $item = CartItem::find($request->item_id);
    $item->quantity = $request->quantity;
    $item->save();

    return response()->json([
        'success' => true,
        'newQuantity' => $item->quantity,
    ]);
}


}
