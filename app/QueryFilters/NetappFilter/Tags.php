<?php

namespace App\QueryFilters\NetappFilter;

use App\QueryFilters\Filter;

class Tags extends Filter
{
    protected function applyFilter($builder)
    {
        if (count(request($this->filterName())) > 0) {
            return $builder->whereJsonContains($this->filterName(), request($this->filterName()));
        }
        return $builder;
    }
}
