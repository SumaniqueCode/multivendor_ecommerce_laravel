<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = New User;
        $user->create([
            'name'=>'Admin Suman Regmi',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('123456789'),
            'address'=>'New York',
            'phone'=>'9876543210',
            'gender'=>'Male',
            'date_of_birth'=>Carbon::create('2000', '01', '01'),
            'profile_image'=>'Images/Users/admin.jpg',
            'role'=>'Admin',
        ]);

        $user->create([
            'name'=>'Seller Suman Regmi',
            'email'=>'suman@gmail.com',
            'password'=>Hash::make('123456789'),
            'address'=>'New York',
            'phone'=>'9812345678',
            'gender'=>'Male',
            'date_of_birth'=>Carbon::create('2000', '01', '01'),
            'profile_image'=>'Images/Users/admin.jpg',
            'role'=>'Seller',
        ]);

        $user->create([
            'name'=>'User Suman Regmi',
            'email'=>'hello@gmail.com',
            'password'=>Hash::make('123456789'),
            'address'=>'New York',
            'phone'=>'9809876543',
            'gender'=>'Male',
            'date_of_birth'=>Carbon::create('2000', '01', '01'),
            'profile_image'=>'Images/Users/admin.jpg',
            'role'=>'User',
        ]);
    }
}
