<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cottage;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Cottage::class, function (Faker $faker) {
    return [
        'name' =>$faker->colorName,
        'nightRate' =>850,
        'dayRate' =>650,
        'isVacant' =>true,
        'category_id' =>$faker->numberBetween(2,1)
    ];
});
