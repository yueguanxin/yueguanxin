<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('index','IndexController@index');
Route::get('liuyan_add','IndexController@l_add');
Route::get('liuyan_del','IndexController@l_del');
Route::get('liuyan_update','IndexController@l_update');
Route::get('liuyan_update_do','IndexController@l_update_do');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
