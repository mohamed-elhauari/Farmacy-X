<?php

namespace App\Strategies\Orders\Filters;

use Illuminate\Database\Eloquent\Builder;

class StatusFilter implements OrderFilterInterface
{
    public function apply(Builder $query, $value): Builder
    {
        return $query->where('status', $value);
    }
}
