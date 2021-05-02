<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Room::class, function (Faker $faker) {
    return [
        'name' => 'Room ' . $faker->colorName,
        'category_id' =>2,
        'description' =>$faker->sentence,
        'price' => 2400,
        'no_of_person' =>5
    ];
});
