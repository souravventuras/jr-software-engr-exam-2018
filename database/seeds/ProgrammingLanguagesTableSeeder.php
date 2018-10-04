<?php

use App\ProgrammingLanguage;
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
        factory(ProgrammingLanguage::class, 20)->create();
    }
}
