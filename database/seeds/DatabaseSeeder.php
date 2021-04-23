<?php

use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CottageSeeder::class);
//        $this->call(ContactPeopleTypeSeeder::class);
//        $this->call(ContactPeopleSeeder::class);
    // $this->call(PrisonerSeeder::class);
    }
}
