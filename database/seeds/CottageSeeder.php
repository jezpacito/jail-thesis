<?php

use App\Cottage;
use Illuminate\Database\Seeder;

class CottageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cottage::class,10)->create();

    }
}
