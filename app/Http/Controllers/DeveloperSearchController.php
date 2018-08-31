<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSearch\Repository\DeveloperRepository;
use SimpleSearch\Repository\LanguageRepository;
use SimpleSearch\Repository\ProgrammingLanguageRepository;

class DeveloperSearchController extends Controller
{
    protected $developer;
    protected $language;
    protected $programming_language;

    public function __construct(DeveloperRepository $developer, LanguageRepository $language, ProgrammingLanguageRepository $programming_language)
    {
        $this->language = $language;
        $this->developer = $developer;
        $this->programming_language = $programming_language;
    }

    public function search(Request $request)
    {
        $language = $this->language->getAll();
        $programming_language = $this->programming_language->getAll();

        $developers = $this->developer->searchDeveloper($request);

        return view('welcome', ['developers' => $developers, 'languages' => $language, 'programming_languages' => $programming_language]);
    }
}
