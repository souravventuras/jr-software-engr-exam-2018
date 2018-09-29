<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Model;


class DevelopersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            ProgrammingLanguageTableSeeder::class,
            LanguageTableSeeder::class
        ]);
        // $faker = Faker::create();
        // foreach (range(1,100) as $index) {
        //     DB::table('developers')->insert([
        //         'email' => $faker->email
        //     ]);
        // }
        DB::table('developers')->truncate();
        DB::table('dev_pro_lang_mapping')->truncate();
        DB::table('dev_lang_mapping')->truncate();
        factory(App\Developer::class, 100)->create()->each(function ($developer) {
            for ($i=0;$i<=5;$i++) {
                DB::table('dev_pro_lang_mapping')->insert([
                    'developer_id' => $developer->id,
                    'programming_language_id' => rand(1,255)
                ]);
                DB::table('dev_lang_mapping')->insert([
                    'developer_id' => $developer->id,
                    'language_id' => rand(1,135)
                ]);
            }
        });
    }
}
