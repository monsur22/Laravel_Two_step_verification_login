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

//Login
Route::get('/login','singinupController@loginpage');
Route::post('/login/action','singinupController@loginaction');
Route::get('/logout','singinupController@logout');

//Singup
Route::get('/singemail','singinupController@singupEmailView');
Route::post('/singemail/action','singinupController@singupEmail');
Route::get('/singToken','singinupController@singVerifyCodeView');
Route::post('/singToken/action','singinupController@singVerifyCode');
Route::get('/singup','singinupController@singuppageView');
Route::post('/singup/action','singinupController@singuppage');

//Forget
Route::get('/For-Email','singinupController@forgetEmailView');
Route::post('/For-Email/action','singinupController@forgetEmail');
Route::get('/For-Token','singinupController@forgetVerifyCodeView');
Route::post('/For-Token/action','singinupController@forgetVerifyCode');
Route::get('/Update-Pass','singinupController@forUpdatePassView');
Route::post('/Update-Pass/action','singinupController@forUpdatePass');

//Dashboard
Route::get('/dashboard','singinupController@dash');

///facebook 
Route::get('login/facebook', 'singinupController@redirectToProvider');
Route::get('login/facebook/callback', 'singinupController@handleProviderCallback');