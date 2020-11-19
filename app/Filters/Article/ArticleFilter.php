<?php
namespace App\Filters\Article;
use App\Filters\AbstractFilter;
class ArticleFilter extends AbstractFilter
{
    protected $filters = [
        'title'      => ArticleTitleFilter::class,
        'date'       => ArticleDateFilter::class,
        'user'       => ArticleUserFilter::class,
    ];
}
