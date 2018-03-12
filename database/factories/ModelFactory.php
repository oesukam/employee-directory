<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Department::class, function ($faker) {
    return [
        'name' => $faker->company,
        'office_number' => $faker->numberBetween($min = 1000000, $max = 9999999999),
    ];
});

$factory->define(App\Employee::class, function ($faker) use ($factory) {
    return [
        'department_id' => $factory->create('App\Department')->id,
        'name' => $faker->name,
        'cellphone' => $faker->numberBetween($min = 1000000, $max = 9999999999),
        'email' => $faker->email,
    ];
});