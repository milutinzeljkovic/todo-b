<?php

use Illuminate\Http\Request;


Route::group([
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register','AuthController@register');
    Route::post('payload','AuthController@payload');

});


Route::group(
    ['prefix' => 'todos', 'middleware' => ['jwt.verify']
], function() {
    Route::post('add', 'TodoController@store');
    Route::get('', 'TodoController@index');
    Route::get('{id}', 'TodoController@show');
    Route::put('{todo}', 'TodoController@update')->middleware('can:update,todo');
    Route::delete('/{todo}', 'TodoController@destroy')->middleware('can:delete,todo');
});