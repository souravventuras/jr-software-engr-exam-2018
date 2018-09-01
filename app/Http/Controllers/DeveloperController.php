<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSearch\Repository\DeveloperRepository;
use SimpleSearch\Repository\LanguageRepository;
use SimpleSearch\Repository\ProgrammingLanguageRepository;

class DeveloperController extends Controller
{
    protected $developer;
    protected $language;
    protected $programming_language;

    public function __construct(DeveloperRepository $developer, LanguageRepository $language, ProgrammingLanguageRepository $programming_language)
    {
        $this->developer = $developer;
        $this->language = $language;
        $this->programming_language = $programming_language;
    }

    public function index()
    {
        $developers = $this->developer->getAll();

        return view('developer.index', ['developers' => $developers]);
    }

    public function create()
    {
        $languages = $this->language->getAll();
        $programming_languages = $this->programming_language->getAll();

        return view('developer.create', ['languages' => $languages, 'programming_languages' => $programming_languages]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $developer = $this->developer->create([
            'email' => $request->input('email')
        ]);

        $developer->language()->attach($request->input('language'));
        $developer->programmingLanguage()->attach($request->input('programmingLanguage'));

        return redirect('/developer')->with('success', 'Developer added');
    }
}
