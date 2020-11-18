<?php

namespace App\Repositories\User;

use App\User;
use App\Repositories\Interfaces\User\UserInterfaces;

class UserRepository implements UserInterfaces
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getByID($id)
    {
        return $this->user->find($id);
    }
    public function store(array $data)
    {
        $user = $this->user->create([
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => bcrypt($data['password']),
        ]);
        return $user;
    }
}
