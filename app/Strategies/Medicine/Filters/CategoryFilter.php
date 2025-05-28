<?php

namespace App\Strategies\Medicine\Filters;

use Illuminate\Database\Eloquent\Builder;

class CategoryFilter implements FilterStrategyInterface
{
    public function apply(Builder $builder, $value): Builder
    {
        return $builder->where('category', $value);
    }
}