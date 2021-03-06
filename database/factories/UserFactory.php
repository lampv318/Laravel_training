<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->unique()->name,
        'address' => $faker->streetAddress,
        'birthday' => $faker->date,
        'weight' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
        'height' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
        'job' => $faker->jobTitle,
        'purpose' => $faker->numberBetween($min = 35, $max = 150),
        'email_verified_at' => now(),
        'password' => bcrypt('123456'), // secret
        'remember_token' => str_random(10),
    ];
});
