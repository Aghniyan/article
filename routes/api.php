<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login','Api\Auth\AuthController@login');
Route::post('register','Api\Auth\AuthController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/profil', 'Api\Auth\AuthController@profil');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
