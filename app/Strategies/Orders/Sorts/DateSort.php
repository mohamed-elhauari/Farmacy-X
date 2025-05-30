<?php

namespace App\Strategies\Orders\Sorts;

use Illuminate\Database\Eloquent\Builder;

class DateSort implements OrderSortInterface
{
    public function apply(Builder $query, string $direction): Builder
    {
        return $query->orderBy('created_at', $direction);
    }
}
