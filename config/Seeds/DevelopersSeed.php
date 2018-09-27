<?php
use Migrations\AbstractSeed;

/**
 * Developers seed.
 */
class DevelopersSeed extends AbstractSeed
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'email'         => $faker->email,
                'created'       => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s')
            ];
        }

        $this->insert('developers', $data);
    }
}
