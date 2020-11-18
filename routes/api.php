<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login','Api\Auth\AuthController@login');
Route::post('register','Api\Auth\AuthController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/profil', 'Api\Auth\AuthController@profil');
    Route::group(['prefix' => 'article'], function () {
        Route::get('/', 'Api\Article\ArticleController@index');
        Route::post('/', 'Api\Article\ArticleController@store');
        Route::get('/{id}', 'Api\Article\ArticleController@show');
        Route::put('/{id}', 'Api\Article\ArticleController@update');
        Route::delete('/{id}', 'Api\Article\ArticleController@delete');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
