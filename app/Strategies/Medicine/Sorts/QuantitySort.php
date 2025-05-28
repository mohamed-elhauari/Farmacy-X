<?php

namespace App\Strategies\Medicine\Sorts;

use Illuminate\Database\Eloquent\Builder;

class QuantitySort implements SortStrategyInterface
{
    public function apply(Builder $builder, $direction = 'asc'): Builder
    {
        return $builder->withSum('inventories', 'quantity')
            ->orderBy('inventories_sum_quantity', $direction);
    }
}