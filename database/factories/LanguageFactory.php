<?php

use Faker\Generator as Faker;

$factory->define(App\Language::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->languageCode
    ];
});
