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
        factory(Cottage::class)->create([
            'name' =>'Cottage 1',
            'category_id' =>1
        ]);
        factory(Cottage::class)->create([
            'name' =>'Cottage 2',
            'category_id' =>1
        ]);
        factory(Cottage::class)->create([
            'name' =>'Room 2',
            'category_id' =>2
        ]);
        factory(Cottage::class)->create([
            'name' =>'Room 1',
            'category_id' =>2
        ]);

    }
}
