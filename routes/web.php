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


    Route::get('/survey', 'HomeController@survey')->name('survey');
    Route::get('/survey/create', 'survey\QuestionnaireController@create')->name('survey.create');
    Route::post('/survey/questionnaires', 'survey\QuestionnaireController@store');
    Route::get('/survey/{questionnaire}', 'survey\QuestionnaireController@show');

    Route::get('/survey/{questionnaire}/questions/create','survey\QuestionController@create');
    Route::post('/survey/{questionnaire}/questions','survey\QuestionController@store');
    Route::get('/surveys/{questionnaire}-{slug}','survey\SurveyController@show');
    Route::post('/surveys/{questionnaire}-{slug}','survey\SurveyController@store');
    Route::post('/surveys/{questionnaire}-{slug}','survey\SurveyController@store');
    Route::delete('/questionnaires/{questionnaire}/questions/{question}','survey\QuestionController@destroy');
    Route::delete('/questionnaires/{questionnaire}/questions/','HomeController@destroy');

//  =---  gWork Urls -----=
    Route::get('gworks/create','GWorkController@create');
    Route::post('gworks/store','GWorkController@store')->name('gwork.store');
    Route::get('gworks/edit/{gWork}','GWorkController@edit')->name('gwork.edit');
    Route::post('gworks/update/{gWork}','GWorkController@update')->name('gwork.update');
    Route::get('gworks','GWorkController@index');
    Route::get('/gworks/{gworks}','GWorkController@show')->name('gwork.show');


    Route::get('/landing', 'HomeController@landing')->name('landing');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('profile','userController') ;

    Route::get('/profile/user/password','userController@editPassword')->name('userPassword');
    Route::post('/editPassword','userController@editUserPassword')->name('editUserPassword');

 });
