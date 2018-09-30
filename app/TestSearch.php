<?php

namespace App;

use Illuminate\Http\Request;

use DB;
use App\Language;
use App\ProgrammingLanguage;
use App\Developer;

class TestSearch
{


    public function testSearchInput($main_search = null)
    {

    	// $main_search = 'java';

    	$p_ids = [];
        $l_ids = [];

    	$p_ids =  ProgrammingLanguage::select('id')->where('name', 'like', $main_search)->pluck('id')->toArray();

        if(!sizeof($p_ids)){
            $l_ids =  Language::select('id')->where('code', 'like', $main_search)->pluck('id')->toArray();
        }

    	if(sizeof($p_ids)){
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
        }

        $developer_ids = array();
        foreach($search_data as $id){
            $developer_ids[] = $id->id;
        }
        $developers =  Developer::whereIn('id', $developer_ids)->get();

        return $developers;
    }

    public function testSearchProgrammingLanguageDropdown($programming_lang_search = null)
    {

    	// $programming_lang_search = 4;

    	$search_data = DB::table('developers')
                        ->select('developers.id')
                        ->join('developer_programming_languages', 'developers.id', 'developer_programming_languages.developer_id')
                        ->where('developer_programming_languages.programming_language_id', $programming_lang_search)
                        ->groupBy('developers.id')
                        ->get();
        $developer_ids = array();
        foreach($search_data as $id){
            $developer_ids[] = $id->id;
        }
        $developers =  Developer::whereIn('id', $developer_ids)->get();

        return $developers;
        
    }

    public function testSearchLanguageDropdown($lang_search = null)
    {

    	// $lang_search = 1;

        $search_data = DB::table('developers')
                        ->select('developers.id')
                        ->join('developer_languages', 'developers.id', 'developer_languages.developer_id')
                        ->where('developer_languages.language_id', $lang_search)
                        ->groupBy('developers.id')
                        ->get();

        $developer_ids = array();
        foreach($search_data as $id){
            $developer_ids[] = $id->id;
        }
        $developers =  Developer::whereIn('id', $developer_ids)->get();

        return $developers;
    }

    public function testSearchInputAndLanguageDropdown($main_search = null, $lang_search = null)
    {

    	// $main_search = 'java';
    	// $lang_search = 1;
    	
    	$p_ids = [];
        $l_ids = [];

    	$p_ids =  ProgrammingLanguage::select('id')->where('name', 'like', $main_search)->pluck('id')->toArray();

        if(!sizeof($p_ids)){
            $l_ids =  Language::select('id')->where('code', 'like', $main_search)->pluck('id')->toArray();
        }

    	if(sizeof($p_ids) && $lang_search){
            $search_data = DB::table('developers')
                        ->select('developers.id')
                        ->join('developer_programming_languages', 'developers.id', 'developer_programming_languages.developer_id')
                        ->join('developer_languages', 'developers.id', 'developer_languages.developer_id')
                        ->where('developer_languages.language_id', $lang_search)
                        ->whereIn('developer_programming_languages.programming_language_id', $p_ids, 'or')
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
        }

        $developer_ids = array();
        foreach($search_data as $id){
            $developer_ids[] = $id->id;
        }
        $developers =  Developer::whereIn('id', $developer_ids)->get();

        return $developers;
    }

    public function testSearchInputAndProgrammingLanguageDropdown($main_search=null, $programming_lang_search=null)
    {

    	// $main_search = 'java';
    	// $programming_lang_search = 4;
    	
    	$p_ids = [];
        $l_ids = [];

    	$p_ids =  ProgrammingLanguage::select('id')->where('name', 'like', $main_search)->pluck('id')->toArray();

        if(!sizeof($p_ids)){
            $l_ids =  Language::select('id')->where('code', 'like', $main_search)->pluck('id')->toArray();
        }

    	if(sizeof($p_ids) && $programming_lang_search){
            $search_data = DB::table('developers')
                        ->select('developers.id')
                        ->join('developer_programming_languages', 'developers.id', 'developer_programming_languages.developer_id')
                        ->join('developer_languages', 'developers.id', 'developer_languages.developer_id')
                        ->where('developer_programming_languages.programming_language_id', $programming_lang_search)
                        ->whereIn('developer_programming_languages.programming_language_id', $p_ids, 'or')
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
        }

        $developer_ids = array();
        foreach($search_data as $id){
            $developer_ids[] = $id->id;
        }
        $developers =  Developer::whereIn('id', $developer_ids)->get();

        return $developers;

    }

    public function testSearchInputLanguageAndProgrammingLanguageDropdown($main_search=null, $lang_search=null, $programming_lang_search=null)
    {

    	// $main_search = 'java';
    	// $lang_search = 1;
    	// $programming_lang_search = 4;
    	
    	$p_ids = [];
        $l_ids = [];

    	$p_ids =  ProgrammingLanguage::select('id')->where('name', 'like', $main_search)->pluck('id')->toArray();

        if(!sizeof($p_ids)){
            $l_ids = Language::select('id')->where('code', 'like', $main_search)->pluck('id')->toArray();
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
        }
        $developer_ids = array();
        foreach($search_data as $id){
            $developer_ids[] = $id->id;
        }
        $developers = Developer::whereIn('id', $developer_ids)->get();

        return $developers;
        
    }
}
