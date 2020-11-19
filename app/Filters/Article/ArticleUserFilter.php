<?php
namespace App\Filters\Article;

class ArticleUserFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('user_id','=',$value);
    }
}
