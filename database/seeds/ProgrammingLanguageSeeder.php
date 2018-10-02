<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgrammingLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programming_languages')->delete();
        $programming_languages = [
            ["name" => "PHP"],
            ["name" => "Python"],
            ["name" => "Java"],
            ["name" => "Ruby"],
            ["name" => "JavaScript"],
            ["name" => "C#"],
            ["name" => "C"],
            ["name" => "C++"]
        ];
        DB::table('programming_languages')->delete();
        \App\Programming_language::insert($programming_languages);
    }
}
