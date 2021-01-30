<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Prisoner::class, function (Faker $faker) {
    return [
        'firstname' =>$faker->firstName,
        'lastname'=>$faker->lastName,
        'middlename' =>$faker->lastName,
        'place_of_birth'=>$faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('d/m/Y'), // outputs something like 17/09/2001
        'permanent_address' =>$faker->address,
        'previous_address' =>$faker->address,
        'age' =>$faker->randomDigit,
        'occupation' =>$faker->sentence,
        'status' =>$faker->randomElement(['single','married','divorce','separated']),
        'interviewer' =>$faker->userAgent,
        'designation' =>$faker->userAgent,
    ];
});
