<?php

use Illuminate\Database\Seeder;

class DevelopersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Fetch the language ids
        $language_ids = App\Language::all('id')->pluck('id')->toArray();

         // Fetch the programming language ids
        $programming_language_ids = App\ProgrammingLanguage::all('id')->pluck('id')->toArray();

        // Create random users
        factory(App\Developer::class, 100)->create()->each(function ($developer) use ($language_ids, $programming_language_ids) {

            // Many-to-many relations with Developer & Language
            $this->attachRandomLanguagesToDeveloper($developer->id, $language_ids);

            // Many-to-many relations with Developer & Language
            $this->attachRandomProgrammingLanguagesToDeveloper($developer->id, $programming_language_ids);

        });
    }

    /**
     * @param $developer_id
     * @param $language_ids
     * @return void
     */
    private function attachRandomLanguagesToDeveloper($developer_id, $language_ids)
    {
        $amount = random_int( 0, count($language_ids) ); // The amount of links for this user

        if($amount > 0) {
            $keys = (array)array_rand($language_ids, $amount); // Random links

            foreach($keys as $key) {
                DB::table('developer_languages')->insert([
                    'language_id' => $language_ids[$key],
                    'developer_id' => $developer_id,
                ]);
            }
        }
    }

    /**
     * @param $developer_id
     * @param $programming_language_ids
     * @return void
     */
    private function attachRandomProgrammingLanguagesToDeveloper($developer_id, $programming_language_ids)
    {
        $amount = random_int( 0, count($programming_language_ids) ); // The amount of links for this user
       
        if($amount > 0) {
            $keys = (array)array_rand($programming_language_ids, $amount); // Random programming language

            foreach($keys as $key) {
                DB::table('developer_programming_languages')->insert([
                    'programming_language_id' => $programming_language_ids[$key],
                    'developer_id' => $developer_id,
                ]);
            }
        }
    }
}
