<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Language;
use App\Programming_language;
use App\Developer;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('developer_languages')->delete();
        DB::table('developer_programming_languages')->delete();
        DB::table('developers')->delete();
        DB::table('languages')->delete();
        DB::table('programming_languages')->delete();

        $languages = [
            ["code" => "bn"],
            ["code" => "en"],
            ["code" => "vn"],
            ["code" => "ja"],
            ["code" => "zh"]
        ];


        foreach ($languages as $language) {
            Language::create($language);
        }


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


        foreach ($programming_languages as $programming_language) {
            Programming_language::create($programming_language);
        }

        $developers = [
            ['email' => 'phan.nguyen@example.com'],
            ['email' => 'quang.pham@example.com'],
            ['email' => 'demmy.pham@example.com'],
            ['email' => 'jemmy.pham@example.com'],
            ['email' => 'demo.pham@example.com']
        ];
        foreach ($developers as $developer) {
            $dev = Developer::create($developer);
            $language_ids = Language::inRandomOrder()->limit(2)->get();
            $dev->languages()->sync($language_ids);

            $pro_language_ids = Programming_language::inRandomOrder()->limit(3)->get();
            $dev->programming_languages()->sync($pro_language_ids);
        }
    }
}
