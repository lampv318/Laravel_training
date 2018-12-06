<?php

use Faker\Generator as Faker;

$factory->define(App\Schedule::class, function (Faker $faker) {
    return [
        'program_id' => $faker->numberBetween($min = 1, $max = 10),
        'name' => $faker->name,
    ];
});
