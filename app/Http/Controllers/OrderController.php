<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Strategies\Orders\OrderContext;
use App\Http\Controllers\Controller;
use App\Strategies\Orders\Sorts\DateSort;
use App\Strategies\Orders\Sorts\AmountSort;
use App\Strategies\Orders\Filters\StatusFilter;
use App\Strategies\Orders\Sorts\ClientNameSort;
use App\Strategies\Orders\Searches\ClientNameSearch;

class OrderController extends Controller
{
    public function indexMyOrders(Request $request)
    {
        $query = Order::with('items')->where('customer_id', auth()->id());

        $context = new OrderContext();

        // ✅ Apply filter (status)
        if ($request->filled('status')) {
            $context->setFilterStrategy(new StatusFilter());
            $query = $context->applyFilters($query, $request->status);
        }

        // ✅ Apply sort (only by date or amount — NOT by client)
        $sort = $request->get('sort', 'date');
        $direction = $request->get('direction', 'desc');

        $context->setSortStrategy(match ($sort) {
            'amount' => new AmountSort(),
            default => new DateSort(),
        });

        $query = $context->applySort($query, $direction);

        $orders = $query->paginate(5)->appends($request->query());

        return view('customer.orders.index', compact('orders'));
    }


    public function indexOrders(Request $request)
    {
        $query = Order::with('items', 'customer');

        $context = new OrderContext();

        if ($request->filled('client')) {
            $context->addSearchStrategy('client', new ClientNameSearch());
            $query = $context->applySearches($query, $request->all());
        }
        
        // Apply filter
        if ($request->filled('status')) {
            $context->setFilterStrategy(new StatusFilter());
            $query = $context->applyFilters($query, $request->status);
        }

        // Apply sort
        $sort = $request->get('sort', 'date');
        $direction = $request->get('direction', 'desc');

        $context->setSortStrategy(match ($sort) {
            'amount' => new AmountSort(),
            'client' => new ClientNameSort(),
            default => new DateSort(),
        });

        $query = $context->applySort($query, $direction);

        $orders = $query->paginate(5)->appends($request->query());

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
