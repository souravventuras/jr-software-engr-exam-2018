<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('api_to_show_developer',function(){

	$data = \DB::table('developers')->select('developers.name as developer_name', 'email as user_email','programming_languages.name as programming_language','languages.code as language code')
							->leftjoin('assign_programming_to_devs','assign_programming_to_devs.dev_id','=','developers.id')
							->leftjoin('assign_language_to_devs','assign_language_to_devs.dev_id','=','developers.id')
							->leftjoin('programming_languages','programming_languages.id','=','assign_programming_to_devs.pl_id')
							->leftjoin('languages','languages.id','=','assign_language_to_devs.lang_id')
							->get();


	return response()->json($data);	




});
