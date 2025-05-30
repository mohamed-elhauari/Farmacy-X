<?php

namespace App\Strategies\Orders\Sorts;

use Illuminate\Database\Eloquent\Builder;

interface OrderSortInterface
{
    public function apply(Builder $query, string $direction): Builder;
}
