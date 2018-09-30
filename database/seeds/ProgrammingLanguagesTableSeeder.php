<?php

use Illuminate\Database\Seeder;

class ProgrammingLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\ProgrammingLanguage::class, 5)->create();
        $programmingLanguage = ['Java', 'C', 'C++', 'Javascript'];
        
        for($i = 0; $i < sizeof($programmingLanguage); $i++){
            DB::table('programming_languages')->insert([
                'name' => $programmingLanguage[$i],
            ]);
        }
    }
}
