<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
    	$languages = ['BD', 'EN', 'JP', 'HINDI', 'ARABIC'];
    	
        for($i = 0; $i < sizeof($languages); $i++){
            DB::table('languages')->insert([
                'code' => $languages[$i],
            ]);
        }
        // factory(App\Language::class, 5)->create();
    }
}
