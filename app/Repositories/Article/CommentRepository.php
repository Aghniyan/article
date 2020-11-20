<?php

namespace App\Repositories\Article;

use App\Comment;
use App\Repositories\Interfaces\Article\CommentInterfaces;

class CommentRepository implements CommentInterfaces
{
    protected $comment;


    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
    public function getByArticle($article){
        return $this->comment->where('article_id',$article)->get();
    }
    public function store(array $data){
        return $this->comment->create($data);
    }
    public function update($id,array $data){
        return $this->comment->find($id)->update($data);
    }
    public function delete($id){
        return $this->comment->find($id)->delete($id);
    }
}
