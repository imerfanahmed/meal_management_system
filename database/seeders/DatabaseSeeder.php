<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(50)->create();
        //creating Manager User
        $manager = new User();
        $manager->name = 'Erfan Ahmed Siam';
        $manager->email ='erfan.siam98@gmail.com';
        $manager->password = Hash::make('12345678');
        $manager->isManager = '1';
        $manager->save();


    }
}
