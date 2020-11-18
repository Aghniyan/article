<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\Interfaces\User\UserInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $user;
    public function __construct(UserInterfaces $user)
    {
        $this->user = $user;
    }
    public function currentUser()
    {
        return Auth::user();
    }
    public function register(RegisterRequest $request)
    {
        $user = $this->user->store($request->all());
        $token = $user->createToken('apiToken')->accessToken;
        return response()->json(['token'=>$token],200);
    }

    public function login(Request $request)
    {
        if (!$this->getLogin($request->all()))
            return response()->json(['error'=>'UnAuthorized'],401);
        $token = $this->currentUser()->createToken('apiToken')->accessToken;
        return response()->json(['token'=> $token],200);
    }

    private function getLogin($data)
    {
        return Auth::attempt($data);
    }

    public function profil()
    {
       $user = $this->user->getByID($this->currentUser());
        return response()->json(['data'=>$user],200);
    }
}
