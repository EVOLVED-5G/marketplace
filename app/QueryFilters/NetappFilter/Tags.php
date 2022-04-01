<?php

namespace App\QueryFilters\NetappFilter;

use App\QueryFilters\Filter;

class Tags extends Filter
{
    protected function applyFilter($builder)
    {
        if (count(request($this->filterName())) > 0) {
            $tags = request($this->filterName());
            return $builder->where(function ($query) use ($tags) {
                foreach ($tags as $tag) {
                    $query->orWhereJsonContains($this->filterName(), $tag);
                }
            });
        }
        return $builder;
    }
}
