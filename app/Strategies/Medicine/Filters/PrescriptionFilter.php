<?php

namespace App\Strategies\Medicine\Filters;

use Illuminate\Database\Eloquent\Builder;

class PrescriptionFilter implements FilterStrategyInterface
{
    public function apply(Builder $builder, $value): Builder
    {
        return $builder->where('prescription_required', filter_var($value, FILTER_VALIDATE_BOOLEAN));
    }
}