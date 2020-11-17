<?php
namespace App\Repositories\Interfaces\User;


interface UserInterfaces{
    public function getByID($id);
    public function store(array $data);
}
