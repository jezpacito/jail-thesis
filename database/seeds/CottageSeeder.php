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
        Cottage::insert([
            [
            'name' =>'Cottage 1',
            'nightRate' =>850,
             'dayRate' =>650,
            'category_id' =>1,
            ],
            [
                'name' =>'Cottage 2',
                'nightRate' =>850,
                 'dayRate' =>650,
                'category_id' =>1,
            ],
            [
                'name' =>'Cottage 3',
                'nightRate' =>850,
                 'dayRate' =>650,
                'category_id' =>1,
            ],
            [
                'name' =>'Cottage 4',
                'nightRate' =>850,
                 'dayRate' =>650,
                'category_id' =>1,
            ],
            [
                'name' =>'Cottage 5',
                'nightRate' =>850,
                 'dayRate' =>650,
                'category_id' =>1,
            ],


        ]);

        //room default
        Room::insert([
            [
                'name' => 'Room 1',
                'category_id' =>2,
                'price' => 2400,
                'no_of_person' =>5
            ],
            [
                'name' => 'Room 2',
                'category_id' =>2,
                'price' => 2400,
                'no_of_person' =>5
            ],
            [
                'name' => 'Room 3',
                'category_id' =>2,
                'price' => 2400,
                'no_of_person' =>5
            ],
            [
                'name' => 'Room 4',
                'category_id' =>2,
                'price' => 2400,
                'no_of_person' =>5
            ],
            [
                'name' => 'Room 5',
                'category_id' =>2,
                'price' => 2400,
                'no_of_person' =>5
            ],
        ]);

    }
}
