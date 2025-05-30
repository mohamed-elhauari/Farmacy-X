<?php

namespace App\Strategies\Orders\Searches;

use Illuminate\Database\Eloquent\Builder;
use App\Strategies\Orders\Searches\SearchInterface;

class ClientNameSearch implements SearchInterface
{
    public function apply(Builder $query, $value): Builder
    {
        return $query->whereHas('customer', function ($q) use ($value) {
            $q->where('name', 'like', '%' . $value . '%');
        });
    }
}
