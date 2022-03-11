<?php

namespace App\QueryFilters\NetappFilter;

use App\QueryFilters\Filter;

class BusinessName extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->where($this->filterName(), 'like', '%' . request($this->filterName()) . '%');
    }
}
