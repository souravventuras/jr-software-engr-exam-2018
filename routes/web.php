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

Route::redirect('/', '/developers');
Route::resources([
    'languages'             => 'LanguageController',
    'developers'            => 'DeveloperController',
    'programming_languages' => 'ProgrammingLanguageController',
], ['except' => ['show']]);
