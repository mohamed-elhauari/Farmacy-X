<?php

namespace App\Strategies\Orders\Searches;

use Illuminate\Database\Eloquent\Builder;

interface SearchInterface
{
    public function apply(Builder $query, $value): Builder;
}
