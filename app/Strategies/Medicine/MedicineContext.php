<?php

namespace App\Strategies\Medicine;

use Illuminate\Database\Eloquent\Builder;
use App\Strategies\Medicine\Filters\FilterStrategyInterface;
use App\Strategies\Medicine\Sorts\SortStrategyInterface;

class MedicineContext
{
    private $filterStrategy;
    private $sortStrategy;

    public function setFilterStrategy(FilterStrategyInterface $strategy): void
    {
        $this->filterStrategy = $strategy;
    }

    public function setSortStrategy(SortStrategyInterface $strategy): void
    {
        $this->sortStrategy = $strategy;
    }

    public function applyFilters(Builder $builder, $value): Builder
    {
        if (empty($value)) {
            return $builder; 
        }
        return $this->filterStrategy->apply($builder, $value);
    }

    public function applySort(Builder $builder, $direction = 'asc'): Builder
    {
        return $this->sortStrategy->apply($builder, $direction);
    }
}