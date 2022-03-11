<?php

namespace App\QueryFilters;

use Illuminate\Support\Str;

abstract class Filter
{

    public function handle($request, $next)
    {
        if (!request()->has($this->filterName())) {
            return $next($request);
        }
        $builder = $next($request);
        return $this->applyFilter($builder);
    }
    protected abstract function applyFilter($request);
    protected function filterName()
    {
        return Str::snake(class_basename($this));
    }
}
