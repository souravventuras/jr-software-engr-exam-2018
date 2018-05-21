<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProgrammingLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programming_languages = ['php', 'ruby', 'javascript', 'python', 'scala', 'kotlin', 'swift', 'java'];

        $faker = Faker::create();
        foreach (range(0,7) as $index) {
            DB::table('programming_languages')->insert([
                'name' => $programming_languages[$index],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        };
    }
}
