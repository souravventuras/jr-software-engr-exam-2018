<?php

namespace App\Http\Controllers\API;

use App\Developers;
use App\ProgrammingLanguage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function DeveloperDetails(Request $request){
        //Checking if a particular developer exits
        if(Developers::where(['id'=>$request->developerID])->count()==0){
            $data['error'] = true;
            $data['error_code'] = 404;
            $data['msg'] = "No Developer Found With This ID";
            return response()->json($data);
        }
        try {
            $developerID = $request->developerID;
            if ($developer=Developers::where('id', $developerID)->get()) {

                // set result array
                $DeveloperCollection = new Collection();
                foreach($developer as $item){
                    $item->Email = $item->email;
                    $item->Programming_Language = ProgrammingLanguage::where('developers_id' , $developerID)->pluck('name');
                    $item->Language = Developers::find($developerID)->programming_language()->pluck('code');
                    $DeveloperCollection->push($item);
                }
                $DeveloperCollection = $DeveloperCollection->map(function ($s) {
                    return collect($s->toArray())
                        ->only(['Email' , 'Programming_Language' , 'Language'])
                        ->all();
                });
                $data['developer_detail'] = $DeveloperCollection;
                $data['error'] = false;
                $data['msg'] = "success";
                return response()->json($data);

            } else {
                $data['error'] = true;
                $data['msg'] = "No developer found with this id";
                return response()->json($data);
            }
        }catch(\Error $e){
            $data['error'] = true;
            $data['error_code'] = 500;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
        catch(\Exception $e){
            $data['error'] = true;
            $data['error_code'] = 500;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDeveloperDetails(){
        try {
            if ($developer=Developers::all()) {

                // set result array
                $DeveloperCollection = new Collection();
                foreach($developer as $item){
                    $item->Email = $item->email;
                    $item->Programming_Language = ProgrammingLanguage::where('developers_id' , $item->id)->pluck('name');
                    $item->Language = Developers::find($item->id)->programming_language()->pluck('code');
                    $DeveloperCollection->push($item);
                }
                $DeveloperCollection = $DeveloperCollection->map(function ($s) {
                    return collect($s->toArray())
                        ->only(['Email' , 'Programming_Language' , 'Language'])
                        ->all();
                });
                $data['developer_details'] = $DeveloperCollection;
                $data['error'] = false;
                $data['msg'] = "success";
                return response()->json($data);

            } else {
                $data['error'] = true;
                $data['msg'] = "No developer found";
                return response()->json($data);
            }
        }catch(\Error $e){
            $data['error'] = true;
            $data['error_code'] = 500;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
        catch(\Exception $e){
            $data['error'] = true;
            $data['error_code'] = 500;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
    }
}
