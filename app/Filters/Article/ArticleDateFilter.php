<?php
namespace App\Filters\Article;

class ArticleDateFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereDate('created_at','=',date('Y-m-d',strtotime($value)));
    }
}
