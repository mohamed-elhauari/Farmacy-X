<?php

namespace App\Strategies\Orders\Sorts;

use Illuminate\Database\Eloquent\Builder;

class ClientNameSort implements OrderSortInterface
{
    public function apply(Builder $query, string $direction): Builder
    {
        return $query->join('users', 'orders.customer_id', '=', 'users.id')
                     ->orderBy('users.name', $direction)
                     ->select('orders.*');
    }
}
