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

            $language = Language::inRandomOrder()->first()->id;
            $programming_language = ProgrammingLanguage::inRandomOrder()->first()->id;
            $developers->languages()->sync([$language]);
            $developers->programming_languages()->sync([$programming_language]);
        };
    }
}
