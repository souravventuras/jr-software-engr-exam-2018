<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Developer;
use App\ProgrammingLanguage;
use App\DevProLangMapping;
use App\LanguageMapping;
use App\Language;

class SearchController extends Controller
{

    /**
     * Searching on developer
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request){

        $form_data = $request->toArray();
        $data['developers'] = [];
        if(isset($form_data['programming']) || isset($form_data['language'])){
            $dev_id_plang = [];
            $dev_id_lang = [];
            if($form_data['programming']){
                $pl = ProgrammingLanguage::where('name',$form_data['programming'])->select('id')->get()->toArray();
                $plang_mapping = DevProLangMapping::whereIn('programming_language_id',$pl)->select('developer_id')->get()->toArray();
                $dev_id_plang = array_column($plang_mapping ,'developer_id');
            }
            if($form_data['language']){
                $language = Language::where('code',$form_data['language'])->select('id')->get()->toArray();
                $lang_mapping = LanguageMapping::whereIn('language_id',$language)->select('developer_id')->get()->toArray();
                $dev_id_lang = array_column($lang_mapping ,'developer_id');
            }

            $result = [];
            if(isset($form_data['programming']) && isset($form_data['language'])){
                $result = array_intersect($dev_id_lang,$dev_id_plang);
            }
            if(isset($form_data['programming']) && !isset($form_data['language'])){
                $result = $dev_id_plang;
            }
            if(!isset($form_data['programming']) && isset($form_data['language'])){
                $result = $dev_id_lang;
            }
            $data['developers'] = Developer::whereIn('id',$result)->paginate(16);

        }
        else{
            $data['developers'] = Developer::paginate(16);
        }
        $data['form_data'] = $form_data;
        return view('search.index')->with($data);
    }

    public function search(){


    }




}
