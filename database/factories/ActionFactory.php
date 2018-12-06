<?php

use Faker\Generator as Faker;

$factory->define(App\Action::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'schedule_id' => $faker->numberBetween($min = 1, $max = 10),
        'time' => $faker->time,
    ];
});
