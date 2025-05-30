<?php

namespace App\Strategies\Orders\Filters;

use Illuminate\Database\Eloquent\Builder;

interface OrderFilterInterface
{
    public function apply(Builder $query, $value): Builder;
}
