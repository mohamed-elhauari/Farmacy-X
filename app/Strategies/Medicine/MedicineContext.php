<?php

namespace App\Strategies\Medicine;

use Illuminate\Database\Eloquent\Builder;
use App\Strategies\Medicine\Sorts\SortStrategyInterface;
use App\Strategies\Medicine\Filters\FilterStrategyInterface;
use App\Strategies\Medicine\Searchs\SearchStrategyInterface;

class MedicineContext
{
    private $filterStrategy;
    private $sortStrategy;
    private $searchStrategy;

    public function setFilterStrategy(FilterStrategyInterface $strategy): void
    {
        $this->filterStrategy = $strategy;
    }

    public function setSortStrategy(SortStrategyInterface $strategy): void
    {
        $this->sortStrategy = $strategy;
    }

    public function setSearchStrategy(SearchStrategyInterface $strategy): void
    {
        $this->searchStrategy = $strategy;
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

    public function applySearch(Builder $builder, $term): Builder
    {
        return $this->searchStrategy->apply($builder, $term);
    }
}