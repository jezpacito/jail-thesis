<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Prisoner::class, function (Faker $faker) {
    return [
        'firstname' =>$faker->firstName,
        'lastname'=>$faker->lastName,
        'middlename' =>$faker->lastName,
        'place_of_birth'=>$faker->address, // outputs something like 17/09/2001
        'permanent_address' =>$faker->address,
        'previous_address' =>$faker->address,
        'age' =>$faker->randomDigit,
        'occupation' =>$faker->sentence,
        'status' =>$faker->randomElement(['single','married','divorce','separated']),
        'interviewer' =>$faker->userAgent,
        'designation' =>$faker->userAgent,
        'alias' =>$faker->name,
        'nationality' =>$faker->colorName,
        'gender' =>$faker->randomElement(['female','male']),
         'birthdate'=>\Carbon\Carbon::now()->subYears(28)
    ];
});
