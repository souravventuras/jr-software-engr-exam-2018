<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //
        //
    for($i = 0; $i < 1000; $i++) {
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'mobile' => rand(11,11),
            'password' => bcrypt('secret'),
            'status' => 1,
            'role'=>1,
            'remember_token'=> rand(1000000,9999999),
        ]);
    }


    
    }
}
