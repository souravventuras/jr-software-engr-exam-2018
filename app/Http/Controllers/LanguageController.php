<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Http\Requests\LanguageCreateRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = Language::paginate(16);
        return view('language.index')->with('language',$language);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageCreateRequest $request)
    {
        $input = Input::all();
        Language::create($input);
        return Redirect::route('language.index')->with('flash', 'Language has been created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = Language::find($id);
        $language->delete();
        return Redirect::route('language.index')->with('flash', 'Language has been deleted!');

    }
}
