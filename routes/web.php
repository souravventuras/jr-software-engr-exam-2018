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
/*
 * ---------------------------------
 * ---------------------------------
 *           API Routes
 * ---------------------------------
 * ---------------------------------
 */
Route::post('api/developer/developer-list_with_details','API\APIController@DeveloperDetails');// fetches details for a specific  developer
Route::get('api/developer/get/developer-list_with_details','API\APIController@getDeveloperDetails');// fetches all developer details