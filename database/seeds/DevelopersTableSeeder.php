<?php

use App\Language;
use App\Developer;
use App\ProgrammingLanguage;
use Illuminate\Database\Seeder;

class DevelopersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        factory(Developer::class, 100)->create()->each(function ($developer) use ($faker) {
            $developer->languages()->attach($faker->randomElements(Language::pluck('id')->toArray(), mt_rand(2, 4)));
            $developer->programmingLanguages()->attach($faker->randomElements(ProgrammingLanguage::pluck('id')->toArray(), mt_rand(2, 4)));
        });
    }
}
