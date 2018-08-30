<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSearch\Repository\ProgrammingLanguageRepository;

class ProgrammingLanguageController extends Controller
{
    protected $programming_language;

    public function __construct(ProgrammingLanguageRepository $programming_language)
    {
        $this->programming_language = $programming_language;
    }

    public function index(){
        $programming_languages = $this->programming_language->getAll();

        return view('programmingLanguage.index', ['programming_languages' => $programming_languages]);
    }

    public function create(){
        return view('programmingLanguage.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);

        $this->programming_language->create([
            'name' => $request->input('name')
        ]);

        return redirect('/programminglanguage')->with('success', 'Programming Language added');
    }
}
