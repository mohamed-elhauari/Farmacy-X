<?php

namespace App\View\Components;

use App\Models\Medicine;
use Illuminate\View\View;
use Illuminate\View\Component;

class AppCustomerLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $categories = Medicine::select('category')->distinct()->pluck('category');

        $cart = null;
        $cartCount = 0;
        if (auth()->check()) {
            $cart = auth()->user()->cart;
            $cartCount = $cart ? $cart->items()->count() : 0;
        }

        return view('layouts.app-customer', compact('categories', 'cartCount', 'cart'));
    }
}
