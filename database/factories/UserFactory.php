<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'age' => $faker->numberBetween(16,70),
        'gender' => $faker->randomElement(['male', 'female']),
        'location' => $faker->city,
        'min_age' => $faker->numberBetween(16,70),
        'max_age' => $faker->numberBetween(16,70),
        'partner_gender' => $faker->randomElement(['male', 'female', 'both']),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'profile_picture' =>  'https://api.adorable.io/avatars/285/' . $faker->randomNumber() . '@adorable.io.png',
        'remember_token' => Str::random(10),
    ];
});
