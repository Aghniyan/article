<?php
namespace App\Filters\Article;

class ArticleTitleFilter
{
    public function filter($builder, $value)
    {
        // dd($value);
        return $builder->where('title', 'LIKE', '%'.$value.'%');
    }
}
