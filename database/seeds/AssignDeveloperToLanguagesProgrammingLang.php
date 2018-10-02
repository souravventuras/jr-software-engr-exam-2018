<?php

use Illuminate\Database\Seeder;

use App\Developer;
use Illuminate\Support\Facades\DB;

class AssignDeveloperToLanguagesProgrammingLang extends Seeder
{
    /**
     * Assign language and programming language to developer
     */
    public function run()
    {
        DB::table('developer_languages')->delete();
        DB::table('developer_programming_languages')->delete();
        $developers = Developer::all();

        foreach ($developers as $developer) {
            $languages = \App\Language::inRandomOrder()->limit(2)->get();
            $p_languages = \App\Programming_language::inRandomOrder()->limit(2)->get();
            $developer->languages()->attach($languages);
            $developer->programming_languages()->attach($p_languages);
        }
    }
}
