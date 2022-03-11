<?php

namespace App\QueryFilters\NetappFilter;

use App\QueryFilters\Filter;

class Name extends Filter
{
    protected function applyFilter($builder)
    {
        if (request($this->filterName()) !== null) {
            return $builder->where($this->filterName(), 'like', '%' . request($this->filterName()) . '%');
        }
        return $builder;
    }
}
