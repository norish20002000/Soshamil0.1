<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'verified'], function () {
    // Route::get('/accountregister', 'AccountController@registerInitView')->name('accountregister');
    Route::get('/accountregister/{id?}', 'AccountController@registerView')->name('accountregister');
    Route::post('/accountregister/{id?}', 'AccountController@register')->name('accountregister');
});

Route::get("/accountpreview/{id}", "AccountController@accountPreview")->name("accountPreview");

// for debug
Route::get("/account", "AccountController@getSnsAccount")->name("accountList");
Route::get("/postdebug/{id}", "PostController@getPost")->name("postdebug");
