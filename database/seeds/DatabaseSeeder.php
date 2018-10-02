<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(UsersTableSeeder::class);
//        $this->call(DemoDataSeeder::class);
        $this->call(DevelopersSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(ProgrammingLanguageSeeder::class);
        $this->call(AssignDeveloperToLanguagesProgrammingLang::class);
    }
}
