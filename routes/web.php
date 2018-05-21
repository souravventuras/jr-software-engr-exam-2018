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

Route::get('developers/language/{id}', 'DevelopersController@language');
Route::get('developers/programming_language/{id}', 'DevelopersController@programmingLanguage');
Route::resource('developers', 'DevelopersController');

Route::resource('languages', 'LanguagesController');

Route::resource('programming_languages', 'ProgrammingLanguagesController');

Route::get('/', function () {
    return view('welcome');
});
