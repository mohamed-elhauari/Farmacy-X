<?php

namespace App\Strategies\Medicine\Searchs;

use Illuminate\Database\Eloquent\Builder;

interface SearchStrategyInterface
{
    public function apply(Builder $builder, $term): Builder;
}