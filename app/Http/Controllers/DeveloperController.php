<?php

namespace App\Http\Controllers;

use App\Language;
use App\Developer;
use App\ProgrammingLanguage;
use App\Http\Requests\DeveloperRequest as Request;

class DeveloperController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        list($languages, $programmingLanguages) = $this->loadSelects();

        $developers = Developer::filter()->paginate(5);
        $developers->appends(request()->all());

        return view('developers.index', compact(
            'developers', 'languages', 'programmingLanguages'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        list($languages, $programmingLanguages) = $this->loadSelects();

        return view('developers.create', compact('languages', 'programmingLanguages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $developer = Developer::create($request->only('email'));
        $developer->programmingLanguages()->attach($request->programming_language_ids);
        $developer->languages()->attach($request->language_ids);

        return redirect('developers')->withSuccess(
            __($request->email . ' Added Successfully.')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Developer $developer
     * @return \Illuminate\Http\Response
     */
    public function edit(Developer $developer)
    {
        list($languages, $programmingLanguages) = $this->loadSelects();

        return view('developers.edit', compact(
            'developer', 'languages', 'programmingLanguages'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Developer $developer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Developer $developer)
    {
        $developer->update(
            $request->only('email')
        );

        $developer->programmingLanguages()->sync($request->programming_language_ids);
        $developer->languages()->sync($request->language_ids);

        return redirect('developers')->withSuccess(
            __($request->email . ' Updated Successfully.')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Developer $developer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Developer $developer)
    {
        $email = $developer->email;
        $developer->delete();

        return redirect()->back()->withSuccess(
            __($email . ' Removed Successfully.')
        );
    }

    /**
     * Common Select Items.
     *
     * @return array
     */
    protected function loadSelects()
    {
        return [
            Language::pluck('code', 'id'),
            ProgrammingLanguage::pluck('name', 'id')
        ];
    }
}
