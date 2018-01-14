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

Route::get('/exams','ExamsController@index');
Route::get('/exams/create', 'ExamsController@create');
Route::post('exams/save','ExamsController@store');
Route::post('exams/storequestion','ExamsController@storeq');
Route::get('/exams/viewewsults/{exam}','ExamsController@showresults');
Route::get('/exams/addquestions/{exam}','ExamsController@addquestion');
Route::get('/exams/edit/{exam}','ExamsController@edit');
Route::get('/exams/{exam}','ExamsController@show');
Route::post('/exams/{exam}/attempt','ExamsController@attempt');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
