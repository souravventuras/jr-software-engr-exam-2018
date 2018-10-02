<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->delete();
        $languages = [
            ["code" => "bn"],
            ["code" => "en"],
            ["code" => "vn"],
            ["code" => "ja"],
            ["code" => "zh"]
        ];

        \App\Language::insert($languages);
    }
}
