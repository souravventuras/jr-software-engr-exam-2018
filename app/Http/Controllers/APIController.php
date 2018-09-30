<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Developer;
use App\ProgrammingLanguage;
use App\Language;
use App\DeveloperProgrammingLanguage;
use App\DeveloperLanguage;


class APIController extends Controller
{

    public function developer($id, $page = 0){
    	$developer = Developer::whereId($id)->first();
    	$take = 10;
    	$programming_languages = DB::table('developer_programming_languages')
    							->join('programming_languages', 'developer_programming_languages.programming_language_id', 'programming_languages.id')
    							->select('programming_languages.*')
    							->where('developer_programming_languages.developer_id', $id)
    							->skip($page*10)
    							->take($take)
    							->get();
    	$languages = DB::table('developer_languages')
    							->join('languages', 'developer_languages.language_id', 'languages.id')
    							->select('languages.*')
    							->where('developer_languages.developer_id', $id)
    							->skip($page*10)
    							->take($take)
    							->get();

        return response()->json([
            "developer" => $developer,
            "programming_languages" => $programming_languages,
            "languages" => $languages
        ], 200);
    }
}
