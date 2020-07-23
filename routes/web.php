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
});

Route::post('storequestion', 'QuestionController@store')->name('storequestion');

Route::put('updatequestion', 'QuestionController@update')->name('updatequestion');

Route::get('deletequestion/{id}', 'QuestionController@delete')->name('deletequestion');

Route::post('storeanswer', 'AnswerController@store')->name('storeanswer');

Route::put('updateanswer', 'AnswerController@update')->name('updateanswer');

Route::get('deleteanswer/{id}', 'AnswerController@delete')->name('deleteanswer');

//buat test CRUD
Route::get('addquestion', function () {
    return view('AddQuestion');
})->name('addquestion');

Route::get('editquestion/{id}', 'QuestionController@edit')->name('editquestion');

Route::get('addanswer', function () {
    return view('AddAnswer');
})->name('addanswer');

Route::get('editanswer/{id}', 'AnswerController@edit')->name('editanswer');