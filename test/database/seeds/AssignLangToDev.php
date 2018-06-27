<?php

use Illuminate\Database\Seeder;

class AssignLangToDev extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
         for ($i=0; $i < 50; $i++) { 

	    	DB::table('assign_language_to_devs')->insert([

	            'dev_id' => rand(1,50),

	            'lang_id' => rand(1,4)

	        ]);

    	}
    }
}
