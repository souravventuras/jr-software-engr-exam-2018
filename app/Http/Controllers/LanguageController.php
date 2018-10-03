<?php

namespace App\Http\Controllers;

use App\Language;
use App\Http\Requests\LanguageRequest as Request;

class LanguageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::withCount('developers')->paginate(10);
        return view('languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Language::create($request->only('code'));

        return redirect('languages')->withSuccess(
            __($request->code . ' Added Successfully.')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Language $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Language $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $language->update(
            $request->only('code')
        );

        return redirect('languages')->withSuccess(
            __($request->code . ' Updated Successfully.')
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Language $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $code = $language->code;
        $language->delete();

        return redirect()->back()->withSuccess(
            __($code . ' Removed Successfully.')
        );
    }
}
