<?php

namespace App\Http\Controllers;

use App\ProgrammingLanguage;
use App\Http\Requests\ProgrammingLanguageRequest as Request;

class ProgrammingLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmingLanguages = ProgrammingLanguage::withCount('developers')->paginate(10);

        return view('programming_languages.index', compact('programmingLanguages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programming_languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProgrammingLanguage::create($request->only('name'));

        return redirect('programming_languages')->withSuccess(
            __($request->name . ' Added Successfully.')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProgrammingLanguage $programmingLanguage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgrammingLanguage $programmingLanguage)
    {
        return view('programming_languages.edit', compact('programmingLanguage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ProgrammingLanguage $programmingLanguage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgrammingLanguage $programmingLanguage)
    {
        $programmingLanguage->update(
            $request->only('name')
        );

        return redirect('programming_languages')->withSuccess(
            __($request->name . ' Updated Successfully.')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProgrammingLanguage $programmingLanguage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgrammingLanguage $programmingLanguage)
    {
        $name = $programmingLanguage->name;
        $programmingLanguage->delete();

        return redirect()->back()->withSuccess(
            __($name . ' Removed Successfully.')
        );
    }
}
