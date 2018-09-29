<?php

use Faker\Generator as Faker;

$factory->define(App\Developer::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail
    ];
});
