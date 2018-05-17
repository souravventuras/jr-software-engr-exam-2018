<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Language;
use App\ProgrammingLanguage;

class DevelopersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,100) as $index) {

            $developers = new App\Developer([
                'email' => $faker->unique()->safeEmail,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $developers->save();
            
            $language_ids = [];
            $programming_languagee_ids = [];

            foreach(range(1,3) as $id) {
                $language_id = Language::inRandomOrder()->first()->id;
                $language_ids[] = $language_id;
            }

            foreach(range(1,5) as $p_id) {
                $programming_language_id = ProgrammingLanguage::inRandomOrder()->first()->id;
                $programming_languagee_ids[] = $programming_language_id;
            }

            $developers->languages()->sync($language_ids);
            $developers->programming_languages()->sync($programming_languagee_ids);
        };
    }
}
