<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login','Api\Auth\AuthController@login');
Route::post('register','Api\Auth\AuthController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/profil', 'Api\Auth\AuthController@profil');
    Route::group(['prefix' => 'article'], function () {
        Route::get('/', 'Api\Article\ArticleController@index');
        Route::get('/me', 'Api\Article\ArticleController@me');
        Route::post('/me', 'Api\Article\ArticleController@store');
        Route::get('/{id}/me', 'Api\Article\ArticleController@show');
        Route::put('/{id}/me', 'Api\Article\ArticleController@update');
        Route::delete('/{id}/me', 'Api\Article\ArticleController@delete');
        //comment
        Route::get('/{article_id}/comment', 'Api\Article\CommentController@index');
        Route::post('/{article_id}/comment', 'Api\Article\CommentController@store');
        Route::put('/{article_id}/{id}/comment', 'Api\Article\CommentController@update');
        Route::delete('{id}/comment', 'Api\Article\CommentController@delete');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
