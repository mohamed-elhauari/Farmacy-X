<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function indexMyOrders()
    {
        $orders = auth()->user()->orders()->latest()->with('items')->get();
        return view('customer.orders.index', compact('orders'));
    }

    public function indexOrders()
    {
        $orders = Order::with('items')->paginate(5);
        return view('pharmacist.orders.index', compact('orders'));
    }

    public function accept(Order $order)
    {
        $order->update(['status' => 'processing']);
        return redirect()->back()->with('success', 'Order accepted.');
    }

    public function reject(Order $order)
    {
        $order->update(['status' => 'cancelled']);
        return redirect()->back()->with('success', 'Order rejected.');
    }

    public function complete(Order $order)
    {
        $order->update(['status' => 'completed']);
        return redirect()->back()->with('success', 'Order completed.');
    }
}
