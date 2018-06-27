<?php

use Illuminate\Database\Seeder;

class AssignProgLangToDev extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          for ($i=0; $i < 50; $i++) { 

	    	DB::table('assign_programming_to_devs')->insert([

	            'dev_id' => rand(1,50),

	            'pl_id' => rand(1,7)

	        ]);

    	}
    }
}
