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
})->name('home');

Route::get('/developer', 'DeveloperController@index')->name('developer.index');
Route::get('/developer/create', 'DeveloperController@create')->name('developer.create');
Route::post('/developer', 'DeveloperController@store')->name('developer.store');

Route::get('/programminglanguage', 'ProgrammingLanguageController@index')->name('programminglanguage.index');
Route::get('/programminglanguage/create', 'ProgrammingLanguageController@create')->name('programminglanguage.create');
Route::post('/programminglanguage', 'ProgrammingLanguageController@store')->name('programminglanguage.store');

Route::get('/language', 'LanguageController@index')->name('language.index');
Route::get('/language/create', 'LanguageController@create')->name('language.create');
Route::post('/language', 'LanguageController@store')->name('language.store');