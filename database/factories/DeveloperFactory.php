<?php

use Faker\Generator as Faker;

$factory->define(App\Developer::class, function (Faker $faker) {
    // return [
    //     'email' => $faker->unique()->safeEmail,
    //     'programming_language_id' => App\ProgrammingLanguage::inRandomOrder()->first()->getKey(),
    //     'language_id' => App\Language::inRandomOrder()->first()->getKey()
    // ];
});
