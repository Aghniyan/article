<?php
namespace App\Repositories\Interfaces\User;


interface UserInterfaces{
    public function getByID(array $data);
    public function store(array $data);
}
