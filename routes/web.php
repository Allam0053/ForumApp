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

//buat test CRUD
Route::get('addquestion', 'QuestionController@index')->name('addquestion');

Route::get('editquestion/{id}', 'QuestionController@edit')->name('editquestion');

Route::get('addanswer', 'AnswerController@index')->name('addanswer');

Route::get('editanswer/{id}', 'AnswerController@edit')->name('editanswer');

Route::get('showanswerbyquestion/{question_id}', 'AnswerController@answerByQuestion');

Route::get('showanswerbyuser/{user_id}', 'AnswerController@answerByUser');

Route::get('showquestionbyuser/{user_id}', 'QuestionController@questionByUser');

Route::get('forum', 'QuestionController@forum')->name('forum');

//sign up
Route::post('/signup', 'authcontroller@signup')->name('signup');
//login route
Route::post('/login', 'authcontroller@login')->name('login');
//logout route
Route::get('/logout', 'authcontroller@logout')->name('logout');