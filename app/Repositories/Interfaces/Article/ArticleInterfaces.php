<?php
namespace App\Repositories\Interfaces\Article;


interface ArticleInterfaces{
    public function all($user);
    public function getByID($id);
    public function store(array $data);
    public function update($id,array $data);
    public function delete($id);
}
