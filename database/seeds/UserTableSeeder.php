<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $user= \App\User::create([
            'name' =>'Jon',
            'last_name' =>'Doe',
//            'email' =>'admin@gmail.com',
            'password' =>'password',
           'username' =>'adminUser',
           'status' =>1,
        //    'rfid_uuid' =>45455454
            ]);
       $user->assignRole('admin');

        $user= \App\User::create([
            'name' =>'Jane',
            'last_name' =>'Doe',
//            'email' =>'staff@gmail.com',
            'password' =>'password',
            'username' =>'staffUser',
            'status' =>1,
            // 'rfid_uuid' =>12345678

        ]);
        $user->assignRole('staff');
    }
}
