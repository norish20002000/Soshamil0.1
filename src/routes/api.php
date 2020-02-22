<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/account", "AccountController@getSnsAccount")->name("accountList");

Route::get('/post','PostController@getPost');
Route::post('/post','PostController@addPost');
Route::delete('/post/{id}','PostController@delete');
Route::put('/post/{id}','PostController@update');
