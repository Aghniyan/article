<?php

namespace App\Repositories\Article;

use App\Article;
use App\Repositories\Interfaces\Article\ArticleInterfaces;

class ArticleRepository implements ArticleInterfaces
{
    protected $article;


    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function all($user){
        return $this->article->where('user_id','=',$user)->get();
    }
    public function getByID($id){
        return $this->article->find($id);
    }
    public function store(array $data){
        return $this->article->create($data);
    }
    public function update($id,array $data){
        return $this->article->where('id',$id)->where('user_id','=',$data['user_id'])->update($data);
    }
    public function delete($id){
        return $this->article->find($id)->delete($id);
    }
}
