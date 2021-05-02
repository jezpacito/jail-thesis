<?php

use App\Category;
use App\Cottage;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::insert([
           [
               'type' =>'cottage'
           ],
           [
              'type' =>'room'
        ],
        ]);
    }
}
