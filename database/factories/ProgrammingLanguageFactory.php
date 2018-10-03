<?php

use Faker\Generator as Faker;

$factory->define(App\ProgrammingLanguage::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word
    ];
});
