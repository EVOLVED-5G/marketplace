<?php

namespace App\QueryFilters\NetappFilter;

use App\QueryFilters\Filter;

class TypeId extends Filter
{
    protected function applyFilter($builder)
    {
        if (count(request($this->filterName())) > 0) {
            return $builder->whereIn($this->filterName(),  request($this->filterName()));
        }
        return $builder;
    }
}
