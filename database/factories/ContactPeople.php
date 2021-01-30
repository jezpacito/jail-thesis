<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\ContactPeople::class, function (Faker $faker) {
    return [
        'name' =>$faker->name,
        'address' =>$faker->address,
        'contact' =>$faker->phoneNumber,
        'contact_people_type_id' =>$faker->randomElement([1,2,3,4,5,6]),
        'relationship'=>$faker->randomElement(['best friend',null]),
        'prisoner_id' =>$faker->randomElement([1,2,3,4,5,6,7,8,9,10])
    ];
});
