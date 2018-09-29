<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgrammingLanguage As Pl;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProgrammingLanguageCreateRequest As PlcRequest;


class ProgrammingLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programming = Pl::paginate(16);
        return view('programming-language.index')->with('programming',$programming);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programming-language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlcRequest $request)
    {
        $input = Input::all();
        $dev = Pl::create($input);
        return Redirect::route('programming-language.index')->with('flash', 'Programming language has been created!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pl = Pl::find($id);
        $pl->delete();
        return Redirect::route('programming-language.index')->with('flash', 'Programming language has been deleted!');

    }
}
