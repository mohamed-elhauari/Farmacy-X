<?php

namespace App\Strategies\Medicine\Sorts;

use Illuminate\Database\Eloquent\Builder;

class NameSort implements SortStrategyInterface
{
    public function apply(Builder $builder, $direction = 'asc'): Builder
    {
        return $builder->orderBy('commercial_name', $direction);
    }
}