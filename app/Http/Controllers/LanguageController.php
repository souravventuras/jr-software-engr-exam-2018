<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSearch\Repository\LanguageRepository;

class LanguageController extends Controller
{
    protected $language;

    public function __construct(LanguageRepository $language)
    {
        $this->language = $language;
    }

    public function index(){
        $languages = $this->language->getAll();

        return view('language.index', ['languages' => $languages]);
    }

    public function create(){
        return view('language.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'code' => 'required'
        ]);

        $this->language->create([
           'code' => $request->input('code')
        ]);

        return redirect('/language')->with('success', 'Language added');
    }
}
