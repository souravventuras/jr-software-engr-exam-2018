<?php

namespace App\Http\Controllers;

use App\Developer;
use App\Language;
use App\Programming_language;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $lang = $request->get('lang', null);
        $p_lang = $request->get('pro_lang', null);
        if ($lang and $p_lang) {
            $developers = Developer::whereHas('languages', function ($q) use ($lang) {
                $q->where('code', '=', $lang);
            })->whereHas('programming_languages', function ($q) use ($p_lang) {
                $q->where('name', '=', $p_lang);
            })->get();
        } else if ($lang) {
            $lang = Language::where('code', '=', $lang)->first();
            $developers = $lang->developers()->get();
        } else if ($p_lang) {
            $pr_lang = Programming_language::where('name', '=', $p_lang)->first();
            $developers = $pr_lang->developers()->get();
        } else {
            $developers = Developer::all();
        }

        $languages = Language::all();
        $programming_languages = Programming_language::all();;

        return view("developers", compact('developers', 'languages', 'programming_languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Developer $developer
     * @return \Illuminate\Http\Response
     */
    public function show(Developer $developer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Developer $developer
     * @return \Illuminate\Http\Response
     */
    public function edit(Developer $developer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Developer $developer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Developer $developer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Developer $developer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Developer $developer)
    {
        //
    }
}
