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
$gender = $faker->randomElement(['male', 'female']);
$image = 'image'. (25) . '.jpeg';
    return [
        'avatar' => $image,
        'name' => $faker->name,
        'surname' => $faker->firstName,
        'birthday' => $faker->date(),
        'email' => $faker->email,
        'gender' => 'female',
        'orientation' => json_encode([$gender]),
        'city' => $faker->address,
        'password' => bcrypt('secret'),
    ];
});
