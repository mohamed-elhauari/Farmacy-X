<?php

namespace App\Strategies\Orders\Sorts;

use Illuminate\Database\Eloquent\Builder;

class AmountSort implements OrderSortInterface
{
    public function apply(Builder $query, string $direction): Builder
    {
        return $query->orderBy('total_amount', $direction);
    }
}
