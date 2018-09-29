<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Developer;
use App\ProgrammingLanguage As Pl;
use App\Language;
use App\DevProLangMapping As PlMapper;
use App\LanguageMapping As LangMapper;



use App\Http\Requests\DeveloperRequest;
use App\Http\Requests\DeveloperUpdateRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the developer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developers = Developer::paginate(16);
        return view('developer.index')->with('developers',$developers);
    }

    /**
     * Show the form for creating a new developer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['programming_language'] = Pl::pluck('name','id');
        $data['language'] = Language::pluck('code','id');
        return view('developer.create')->with($data);
    }

    /**
     * Store a newly created developer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeveloperRequest $request)
    {
        $input = Input::all();
        $dev = Developer::create($input);
        $input['developer_id'] = $dev->id;

        foreach ($input['programming_language_id'] as $key => $value) {
            $data['developer_id'] = $input['developer_id'];
            $data['programming_language_id'] = $value;
            PlMapper::create($data);
        }

        foreach ($input['language_id'] as $key => $value) {
            $data['developer_id'] = $input['developer_id'];
            $data['language_id'] = $value;
            LangMapper::create($data);
        }
        return Redirect::route('developer.index')->with('flash', 'Developer has been created!');
    }

    /**
     * Display the specified developer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $developer = Developer::find($id);
        return view('developer.show')->with('developer',$developer);
    }

    /**
     * Show the form for editing the specified developer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['developer'] = Developer::find($id);
        $data['programming_language'] = Pl::pluck('name','id');
        $data['language'] = Language::pluck('code','id');
        return view('developer.edit')->with($data);

    }

    /**
     * Update the specified developer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeveloperUpdateRequest $request, $id)
    {
        $input = Input::all();

        PlMapper::where('developer_id', $id)->delete();
        LangMapper::where('developer_id', $id)->delete();

        foreach ($input['programming_language_id'] as $key => $value) {
            $data['developer_id'] = $id;
            $data['programming_language_id'] = $value;
            PlMapper::create($data);
        }

        foreach ($input['language_id'] as $key => $value) {
            $data['developer_id'] = $id;
            $data['language_id'] = $value;
            LangMapper::create($data);
        }
        return Redirect::route('developer.index')->with('flash', 'Developer has been updated!');
    }

    /**
     * Remove the specified developer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $developer = Developer::find($id);
        $developer->delete();
        PlMapper::where('developer_id', $id)->delete();
        LangMapper::where('developer_id', $id)->delete();
        return Redirect::route('developer.index')->with('flash', 'Developer has been deleted!');
    }
}
