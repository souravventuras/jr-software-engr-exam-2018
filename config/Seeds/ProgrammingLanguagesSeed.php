<?php
use Migrations\AbstractSeed;

/**
 * ProgrammingLanguages seed.
 */
class ProgrammingLanguagesSeed extends AbstractSeed
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];

        for ($i = 0; $i < 8; $i++) {
            $data[] =
                [
                    'name' => 'php',
                    'created' => date('Y-m-d H:i:s'),
                    'modified' => date('Y-m-d H:i:s'),
                ];
            $data[] = [
                'name' => 'html',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
            $data[] = [
                'name' => 'javascript',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
            $data[] =  [
                'name' => 'jquery',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
            $data[] = [
                'name' => 'json',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
            $data[] = [
                'name' => 'asp',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
            $data[] =  [
                'name' => 'angular',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
            $data[] =   [
                'name' => 'nodejs',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
            $data[] =    [
                'name' => 'python',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
            $data[] =  [
                'name' => 'c',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
            $data[] =  [
                'name' => 'c#',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
            $data[] =    [
                'name' => 'java',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $this->insert('programming_languages', $data);
    }
}
