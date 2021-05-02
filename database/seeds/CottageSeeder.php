<?php

use App\Cottage;
use App\Room;
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
            'name' =>'Cottage 3',
            'category_id' =>1
        ]);
        factory(Cottage::class)->create([
            'name' =>'Cottage 4',
            'category_id' =>1
        ]);
        factory(Cottage::class)->create([
            'name' =>'Cottage 5',
            'category_id' =>1
        ]);
        factory(Room::class,5)->create();

    }
}
