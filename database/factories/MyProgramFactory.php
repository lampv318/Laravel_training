<?php

use Faker\Generator as Faker;

$factory->define(App\MyProgram::class, function (Faker $faker) {
    return [
        'user_id' =>  $faker->numberBetween($min = 1, $max = 10),
        'program_id' =>  $faker->numberBetween($min = 1, $max = 10),
    ];
});
