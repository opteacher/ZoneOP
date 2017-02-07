<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::any("index", "UserController@initLogin");
Route::any("login", "UserController@initLogin");
Route::any("register", "UserController@initRegister");
Route::any("chklgn", "UserController@chkLogin");
Route::any("chkreg", "UserController@chkRegister");
Route::any("test", "MsgController@test");

Route::any("shwmn", "DairyController@showMain");
Route::any("shwdl", "DairyController@showDairyList");

Route::any("newdry", "DairyController@newDairy");
Route::any("deldry", "DairyController@delDairy");

Route::get('/', function () {
    return view('welcome');
});
