<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $guarded= [];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
