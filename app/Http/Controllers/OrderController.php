<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function indexMyOrders()
    {
        $orders = auth()->user()->orders()->with('items')->get();
        return view('customer.orders.index', compact('orders'));
    }

    public function indexOrders()
    {
        $orders = Order::with('items')->paginate(10);
        return view('pharmacist.orders.index', compact('orders'));
    }
}
