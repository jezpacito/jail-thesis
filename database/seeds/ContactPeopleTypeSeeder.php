<?php

use Illuminate\Database\Seeder;

class ContactPeopleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ContactPeopleType::create([
            'type' =>'spouse'
        ]);

        \App\ContactPeopleType::create([
            'type' =>'children'
        ]);
        \App\ContactPeopleType::create([
            'type' =>'parents'
        ]);
        \App\ContactPeopleType::create([
            'type' =>'siblings'
        ]);
        \App\ContactPeopleType::create([
            'type' =>'friends'
        ]);

        \App\ContactPeopleType::create([
            'type' =>'others'
        ]);
    }
}
