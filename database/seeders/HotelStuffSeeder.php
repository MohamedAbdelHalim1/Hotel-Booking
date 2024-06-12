<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class HotelStuffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         // we will seed user table with 5 records related to admin and employees role
         // Seed for admin role
         User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        // Seed for employee role
        for ($i = 1; $i <= 4; $i++) {
            User::create([
                'name' => 'Employee ' . $i,
                'email' => 'employee' . $i . '@example.com',
                'password' => Hash::make('123456'),
                'role' => 'employee',
            ]);
        }
    }
}
