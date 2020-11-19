<?php
namespace App\Filters\Article;

class ArticleTitleFilter
{
    public function filter($builder, $value)
    {
        return $builder->orderBy($value['order_by'], $value['sort_by']);
    }
}
