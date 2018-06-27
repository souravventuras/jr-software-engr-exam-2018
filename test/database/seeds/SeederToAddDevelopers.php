<?php

use Illuminate\Database\Seeder;

class SeederToAddDevelopers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for ($i=0; $i < 47; $i++) { 

	    	DB::table('developers')->insert([

	            'name' => str_random(8),

	            'email' => str_random(12).'@gmail.com'

	        ]);

    	}
    }
}
