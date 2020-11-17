<?php

namespace App\Repositories\User;

use App\User;
use App\Repositories\Interfaces\User\UserInterfaces;

class UserRepository implements UserInterfaces
{
    public function getByID(array $data)
    {
    }
    public function store(array $data)
    {
        $user = User::create([
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => bcrypt($data['password']),
        ]);
        return $user;
    }
}
