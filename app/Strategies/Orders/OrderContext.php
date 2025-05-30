<?php

namespace App\Strategies\Orders;

use Illuminate\Database\Eloquent\Builder;
use App\Strategies\Orders\Searches\SearchInterface;
use App\Strategies\Orders\Sorts\OrderSortInterface;
use App\Strategies\Orders\Filters\OrderFilterInterface;

class OrderContext
{
    protected ?OrderFilterInterface $filterStrategy = null;
    protected ?OrderSortInterface $sortStrategy = null;

    public function setFilterStrategy(OrderFilterInterface $strategy): void
    {
        $this->filterStrategy = $strategy;
    }

    public function setSortStrategy(OrderSortInterface $strategy): void
    {
        $this->sortStrategy = $strategy;
    }

    public function applyFilters(Builder $query, $value): Builder
    {
        return $this->filterStrategy ? $this->filterStrategy->apply($query, $value) : $query;
    }

    public function applySort(Builder $query, string $direction = 'asc'): Builder
    {
        return $this->sortStrategy ? $this->sortStrategy->apply($query, $direction) : $query;
    }

    public function addSearchStrategy(string $key, SearchInterface $strategy): void
    {
        $this->searchStrategies[$key] = $strategy;
    }

    public function applySearches(Builder $query, array $searchValues): Builder
    {
        foreach ($this->searchStrategies as $key => $strategy) {
            if (!empty($searchValues[$key])) {
                $query = $strategy->apply($query, $searchValues[$key]);
            }
        }

        return $query;
    }
}
