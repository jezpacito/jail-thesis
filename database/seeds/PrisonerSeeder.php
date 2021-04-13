<?php

use Illuminate\Database\Seeder;

class PrisonerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Prisoner::class,10)->create();
    }
}
