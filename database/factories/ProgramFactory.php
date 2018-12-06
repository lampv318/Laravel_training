<?php

use Faker\Generator as Faker;

$factory->define(App\Program::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'level' => $faker->numberBetween($min = 1, $max = 10),
        'content' => $faker->text,
    ];
});
