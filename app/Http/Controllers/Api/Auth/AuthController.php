<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\Interfaces\User\UserInterfaces;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $user;

    public function __construct(UserInterfaces $user)
    {
        $this->user = $user;
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->user->store($request->all());
        $token = $user->createToken('apiToken')->accessToken;
        return response()->json(['token'=>$token],200);
    }

    public function login(Request $request)
    {

        $credential = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (Auth::attempt($credential)) {
            $token = Auth::user()->createToken('apiToken')->accessToken;
            return response()->json(['token'=>$token],200);
        } else {
            return response()->json(['error'=>'UnAuthorized'],401);
        }
    }
}
