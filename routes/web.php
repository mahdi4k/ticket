<?php

use Illuminate\Support\Facades\Route;

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




Route::prefix('ertebat')->group(function () {
    Route::get('/', function () {
        return redirect('ertebat/login');

    });

    Route::get('/landing', 'HomeController@landing')->name('landing');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('profile','userController') ;

    Route::get('/profile/user/password','userController@editPassword')->name('userPassword');
    Route::post('/editPassword','userController@editUserPassword')->name('editUserPassword');

 });
