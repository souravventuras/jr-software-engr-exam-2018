<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Developer;
use App\Language;
use App\ProgrammingLanguage;
use App\DeveloperProgrammingLanguage;
use App\DeveloperLanguage;
use DB;

class SearchController extends Controller
{
    public function index(){
    	$data['main_search'] = '';
    	$data['lang_search'] = '';
    	$data['programming_lang_search'] = '';
        $data['languages'] = Language::get();
        $data['programming_languages'] = ProgrammingLanguage::get();
    	$data['developers'] = Developer::get();

    	return view('developers', $data);
    }

    public function postSearch(Request $request){
    	$main_search = $request->input('main_search');
    	$lang_search = $request->input('lang_search');
    	$programming_lang_search = $request->input('programming_lang_search');
    	$data['main_search'] = $main_search;
    	$data['lang_search'] = $lang_search;
    	$data['programming_lang_search'] = $programming_lang_search;

        $data['languages'] = Language::get();
        $data['programming_languages'] = ProgrammingLanguage::get();

        $p_ids = [];
        $l_ids = [];
        $search_data = [];
        if($main_search){
            $p_ids = ProgrammingLanguage::select('id')->where('name', 'like', $main_search)->pluck('id')->toArray();

            if(!sizeof($p_ids)){
                $l_ids = Language::select('id')->where('code', 'like', $main_search)->pluck('id')->toArray();
            }
        }

        if(sizeof($p_ids) && $lang_search && $programming_lang_search){
            $search_data = DB::table('developers')
                                ->select('developers.id')
                                ->join('developer_programming_languages', 'developers.id', 'developer_programming_languages.developer_id')
                                ->join('developer_languages', 'developers.id', 'developer_languages.developer_id')
                                ->where('developer_programming_languages.programming_language_id', $programming_lang_search)
                                ->where('developer_languages.language_id', $lang_search)
                                ->whereIn('developer_programming_languages.programming_language_id', $p_ids, 'or')
                                ->groupBy('developers.id')
                                ->get();
        }else if(sizeof($p_ids) && $lang_search){
            $search_data = DB::table('developers')
                                ->select('developers.id')
                                ->join('developer_programming_languages', 'developers.id', 'developer_programming_languages.developer_id')
                                ->join('developer_languages', 'developers.id', 'developer_languages.developer_id')
                                ->where('developer_languages.language_id', $lang_search)
                                ->whereIn('developer_programming_languages.programming_language_id', $p_ids, 'or')
                                ->groupBy('developers.id')
                                ->get();
        }else if(sizeof($p_ids) && $programming_lang_search){
            $search_data = DB::table('developers')
                                ->select('developers.id')
                                ->join('developer_programming_languages', 'developers.id', 'developer_programming_languages.developer_id')
                                ->join('developer_languages', 'developers.id', 'developer_languages.developer_id')
                                ->where('developer_programming_languages.programming_language_id', $programming_lang_search)
                                ->whereIn('developer_programming_languages.programming_language_id', $p_ids, 'or')
                                ->groupBy('developers.id')
                                ->get();
        }else if(sizeof($l_ids) && $lang_search && $programming_lang_search){
            $search_data = DB::table('developers')
                                ->select('developers.id')
                                ->join('developer_programming_languages', 'developers.id', 'developer_programming_languages.developer_id')
                                ->join('developer_languages', 'developers.id', 'developer_languages.developer_id')
                                ->where('developer_programming_languages.programming_language_id', $programming_lang_search)
                                ->where('developer_languages.language_id', $lang_search)
                                ->whereIn('developer_languages.language_id', $l_ids, 'or')
                                ->groupBy('developers.id')
                                ->get();
        }else if(sizeof($l_ids) && $lang_search){
            $search_data = DB::table('developers')
                                ->select('developers.id')
                                ->join('developer_programming_languages', 'developers.id', 'developer_programming_languages.developer_id')
                                ->join('developer_languages', 'developers.id', 'developer_languages.developer_id')
                                ->where('developer_languages.language_id', $lang_search)
                                ->whereIn('developer_languages.language_id', $l_ids, 'or')
                                ->groupBy('developers.id')
                                ->get();
        }else if(sizeof($l_ids) && $programming_lang_search){
            $search_data = DB::table('developers')
                                ->select('developers.id')
                                ->join('developer_programming_languages', 'developers.id', 'developer_programming_languages.developer_id')
                                ->join('developer_languages', 'developers.id', 'developer_languages.developer_id')
                                ->where('developer_programming_languages.programming_language_id', $programming_lang_search)
                                ->whereIn('developer_languages.language_id', $l_ids, 'or')
                                ->groupBy('developers.id')
                                ->get();
        }else if($lang_search && $programming_lang_search){
            $search_data = DB::table('developers')
                                ->select('developers.id')
                                ->join('developer_programming_languages', 'developers.id', 'developer_programming_languages.developer_id')
                                ->join('developer_languages', 'developers.id', 'developer_languages.developer_id')
                                ->where('developer_programming_languages.programming_language_id', $programming_lang_search)
                                ->where('developer_languages.language_id', $lang_search)
                                ->groupBy('developers.id')
                                ->get();
        }else if(sizeof($p_ids)){
            $search_data = DB::table('developers')
                                ->select('developers.id')
                                ->join('developer_programming_languages', 'developers.id', 'developer_programming_languages.developer_id')
                                ->join('developer_languages', 'developers.id', 'developer_languages.developer_id')
                                ->whereIn('developer_programming_languages.programming_language_id', $p_ids, 'or')
                                ->groupBy('developers.id')
                                ->get();
        }else if(sizeof($l_ids)){
            $search_data = DB::table('developers')
                                ->select('developers.id')
                                ->join('developer_programming_languages', 'developers.id', 'developer_programming_languages.developer_id')
                                ->join('developer_languages', 'developers.id', 'developer_languages.developer_id')
                                ->whereIn('developer_languages.language_id', $l_ids, 'or')
                                ->groupBy('developers.id')
                                ->get();
        }else if($lang_search){
            $search_data = DB::table('developers')
                                ->select('developers.id')
                                ->join('developer_languages', 'developers.id', 'developer_languages.developer_id')
                                ->where('developer_languages.language_id', $lang_search)
                                ->groupBy('developers.id')
                                ->get();
        }else if($programming_lang_search){
            $search_data = DB::table('developers')
                                ->select('developers.id')
                                ->join('developer_programming_languages', 'developers.id', 'developer_programming_languages.developer_id')
                                ->where('developer_programming_languages.programming_language_id', $programming_lang_search)
                                ->groupBy('developers.id')
                                ->get();
        }

        $developer_ids = array();
        foreach($search_data as $id){
            $developer_ids[] = $id->id;
        }

        $data['developers'] = Developer::whereIn('id', $developer_ids)->get();



        // $search_data = DeveloperProgrammingLanguage::where('programming_language_id', $programming_lang_search)
        //                 ->when($lang_search, function ($query) use ($lang_search){
        //                     $query->whereHas('developer', function ($query) use ($lang_search) {
        //                         $query->whereHas('Languages', function($query) use ($lang_search){
        //                                 return $query->where('developer_languages.language_id', $lang_search);
        //                             });

        //                     });
        //                 })->get();
        //                 
    	return view('developers', $data);
    }
}
