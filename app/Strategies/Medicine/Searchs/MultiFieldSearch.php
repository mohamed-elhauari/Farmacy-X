<?php

namespace App\Strategies\Medicine\Searchs;

use Illuminate\Database\Eloquent\Builder;

class MultiFieldSearch implements SearchStrategyInterface
{
    public function apply(Builder $builder, $term): Builder
    {
        return $builder->where(function ($query) use ($term) {
            $query->where('commercial_name', 'like', '%' . $term . '%')
                  ->orWhere('dci', 'like', '%' . $term . '%')
                  ->orWhere('laboratory', 'like', '%' . $term . '%');
        });
    }
}
