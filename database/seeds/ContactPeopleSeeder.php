<?php

use Illuminate\Database\Seeder;

class ContactPeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ContactPeople::class,100);
    }
}
