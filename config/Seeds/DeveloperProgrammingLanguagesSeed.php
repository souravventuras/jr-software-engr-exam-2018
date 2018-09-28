<?php
use Migrations\AbstractSeed;

/**
 * DeveloperProgrammingLanguages seed.
 */
class DeveloperProgrammingLanguagesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 1; $i++) {
            $data[] = [
                'developer_id'         => 1,
                'programming_language_id'         => 1,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 1,
                'programming_language_id'         => 2,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 2,
                'programming_language_id'         => 3,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];$data[] = [
                'developer_id'         => 2,
                'programming_language_id'         => 4,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];$data[] = [
                'developer_id'         => 3,
                'programming_language_id'         => 5,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];$data[] = [
                'developer_id'         => 3,
                'programming_language_id'         => 6,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 4,
                'programming_language_id'         => 7,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 4,
                'programming_language_id'         => 5,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 5,
                'programming_language_id'         => 9,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 5,
                'programming_language_id'         => 2,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 6,
                'programming_language_id'         => 3,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 6,
                'programming_language_id'         => 4,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 7,
                'programming_language_id'         => 8,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 7,
                'programming_language_id'         => 9,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 8,
                'programming_language_id'         => 9,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 8,
                'programming_language_id'         => 10,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 9,
                'programming_language_id'         => 11,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 9,
                'programming_language_id'         => 12,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 10,
                'programming_language_id'         => 5,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
            $data[] = [
                'developer_id'         => 10,
                'programming_language_id'         => 6,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
        }

        $this->insert('developer_programming_languages', $data);
    }
}
