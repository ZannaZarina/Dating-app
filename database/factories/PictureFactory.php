<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Picture;
use Faker\Generator as Faker;

$factory->define(Picture::class, function (Faker $faker) {
    return [
        'location' => 'https://api.adorable.io/avatars/285/' . $faker->randomNumber() . '@adorable.io.png'
    ];
});
