<?php

namespace App;

use App\Filters\Article\ArticleFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Article extends Model
{
    public $guarded= [];

    public function scopeFilter(Builder $builder, Request $request)
    {
        return (new ArticleFilter($request))->filter($builder);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
