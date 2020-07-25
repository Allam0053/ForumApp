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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('storequestion', 'QuestionController@store')->name('storequestion');

Route::put('updatequestion', 'QuestionController@update')->name('updatequestion');

Route::get('deletequestion/{id}', 'QuestionController@delete')->name('deletequestion');

Route::post('storeanswer', 'AnswerController@store')->name('storeanswer');

Route::put('updateanswer', 'AnswerController@update')->name('updateanswer');

Route::get('deleteanswer/{id}', 'AnswerController@delete')->name('deleteanswer');

Route::get('showanswerbyquestion/{question_id}', 'AnswerController@answerByQuestion');

Route::get('showanswerbyuser/{user_id}', 'AnswerController@answerByUser');

Route::get('showquestionbyuser/{user_id}', 'QuestionController@questionByUser');

Route::get('forum', 'QuestionController@forum')->name('forum');

Route::get('listQ', 'QuestionController@questionByUser')->name('listQ');

Route::get('listA', 'AnswerController@answerByUser')->name('listA');

Route::get('view/{id}', 'QuestionController@view')->name('view');

//sign up
Route::post('/signup', 'authcontroller@signup')->name('signup');
//login route
Route::post('/login', 'authcontroller@login')->name('login');
//logout route
Route::get('/logout', 'authcontroller@logout')->name('logout');

Route::group( ['middleware' => ['auth']] , function(){
	//page awal login
	Route::get('home', function () {
		return view('home');
	})->name('home')->middleware('auth');
});
