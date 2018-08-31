<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\Models\Language;
use App\Models\ProgrammingLanguage;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(LanguageTableSeeder::class);
         $this->call(ProgrammingLanguageTableSeeder::class);
         $this->call(DeveloperTableSeeder::class);
    }

}

class LanguageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('languages')->delete();

        $country_code = ['BN', 'EN', 'VN', 'CN', 'DA', 'SP'];

        foreach ($country_code as $code) {
            Language::create([
               'code' => $code
            ]);
        }


    }
}

class ProgrammingLanguageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('programming_languages')->delete();
        $programming_language_name = ['php', 'java', 'javascript', 'python', 'ruby', 'c++'];

        foreach ($programming_language_name as $name) {
            ProgrammingLanguage::create([
                'name' => $name
            ]);
        }

    }
}

class DeveloperTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('developers')->delete();

        $languages = App\Models\Language::all()->pluck('id')->toArray();
        $programming_language = App\Models\ProgrammingLanguage::all()->pluck('id')->toArray();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {

            $programming_language_random = mt_rand(0, count($programming_language) - 1);
            $language_random = mt_rand(0, count($languages) - 1);

            $developer = App\Models\Developer::create([
                'email' => $faker->email
            ]);

            $developer->language()->attach($languages[$language_random]);
            $developer->programmingLanguage()->attach($programming_language[$programming_language_random]);
        }
    }
}
