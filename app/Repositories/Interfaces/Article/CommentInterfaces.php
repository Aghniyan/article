<?php
namespace App\Repositories\Interfaces\Article;


interface CommentInterfaces{
    public function getByArticle($article);
    public function store(array $data);
    public function update($id,array $data);
    public function delete($id);
}
