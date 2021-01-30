<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Room::class, function (Faker $faker) {
    return [
        'name' => 'Room',
        'room_types_id' =>$faker->randomElements([1,2]),
        'status' =>'available',
        'description' =>$faker->sentence,
        'price' =>$faker->randomElements([3500,4500]),
    ];
});
