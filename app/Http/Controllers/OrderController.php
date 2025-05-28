<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function indexMyOrders()
    {
        $orders = auth()->user()->orders()->with('items')->get();
        return view('customer.orders.index', compact('orders'));
    }
}
