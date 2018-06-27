<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Developers;
use App\AssignProgrammingToDev;
use App\AssignLanguageToDev;

class UserController extends Controller
{

   

    public function show(Request $request)
    {
        //dd($request->all());


        $data['developers'] = Developers::where('id',$request->dev_id)->first();
        $data['assigned_prog_lang'] = AssignProgrammingToDev::where('dev_id',$request->dev_id)->leftjoin('programming_languages','programming_languages.id','=','assign_programming_to_devs.pl_id')->get();
        $data['assigned_lang'] = AssignLanguageToDev::where('dev_id',$request->dev_id)->leftjoin('languages','languages.id','=','assign_language_to_devs.lang_id')->get();

        if(!isset($data['developers'])){

            $data['msg'] = true;
        }

        //dd($data);

        return view('home',['email'=>$data['developers']->email, 'pl'=>$data['assigned_prog_lang'],'lang'=> $data['assigned_lang']]);

      
    }

  
    public function searchdeveloper(Request $request)
    {

         $data = [];


        if($request->has('q')){
            $search = $request->q;

            $data = \DB::table("developers")
                    ->select("id","name","email")
                    ->where('email','LIKE',"$search%")
                    ->get();


             }

             return response()->json($data);
    } 

      public function getuserinfo(Request $request)
    {
          $devs = Developers::where('id',$request->title)->first();

         return response()->json($devs);

             
    }



}
