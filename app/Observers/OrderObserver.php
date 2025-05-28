<?php

namespace App\Observers;

use App\Models\Order;
use App\Mail\OrderStatusChangedMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\OrderStatusChanged;

class OrderObserver
{
    public function updated(Order $order)
    {
        if ($order->isDirty('status') && $order->customer && $order->customer->email) {
            Mail::to($order->customer->email)
                ->send(new OrderStatusChangedMail($order, $order->status));
        }
    }
}
