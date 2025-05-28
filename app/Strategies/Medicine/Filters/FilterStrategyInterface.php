<?php

namespace App\Strategies\Medicine\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterStrategyInterface
{
    public function apply(Builder $builder, $value): Builder;
}