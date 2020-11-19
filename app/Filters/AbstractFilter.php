<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AbstractFilter{
    protected $request;
    protected $scopes=[];
    protected $filters=[];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function filter(Builder $builder)
    {
        $this->scopes = $this->getFilters();
        foreach ($this->scopes as $key => $value) {
            $this->resolveFilter($key)->filter($builder, $value);
        }

        return $builder;
    }

    protected function getFilters()
    {
        return array_filter($this->request->only(array_keys($this->filters)));
    }

    protected function resolveFilter($key)
    {
        return new $this->filters[$key];
    }
}
