<?php

namespace App\Strategies\Medicine\Sorts;

use Illuminate\Database\Eloquent\Builder;

interface SortStrategyInterface
{
    public function apply(Builder $builder, $direction = 'asc'): Builder;
}